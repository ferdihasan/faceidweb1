<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Gumlet\ImageResize;
use PHPMailer\PHPMailer\PHPMailer;

class RegisterFaceIdController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $image = $request->file('image');

        // Resize the image to a smaller size
        $image = ImageResize::createFromString(file_get_contents($image->getRealPath()))
            ->resizeToWidth(500)
            ->getImageAsString(IMAGETYPE_JPEG);

        // Save the image to storage
        $path = Storage::putFile('faces', $image);

        // Store the face embedding to database
        $embedding = $this->getFaceEmbedding($path);
        DB::table('faces')->insert([
            'name' => $name,
            'embedding' => json_encode($embedding),
        ]);

        // Send email confirmation
        $this->sendEmailConfirmation($name);

        return view('register-success');
    }

    private function getFaceEmbedding($path)
    {
        // Load the image
        $image = file_get_contents(storage_path("app/$path"));

        // Detect the face landmarks
        $detector = new \FaceDetector();
        $detector->setResourcePath(base_path() . '/vendor/pionixlabs/face-detector/resources');
        $detector->setJpegQuality(100);
        $detector->setHandleRotation(false);
        $detector->faceDetect($image);

        if (empty($detector->getFace()))
            return null;

        $face = $detector->getFace();
        $land

        // Extract the face descriptor
        $faceDescriptor = new \FaceDescriptor();
        $faceDescriptor->extract($image, $face['x'], $face['y'], $face['w'], $face['h'], $detector->getFaceAngle());

        return $faceDescriptor->getFaceDescriptor();
    }

    private function sendEmailConfirmation($name)
    {
        // Configure PHPMailer
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');
        $mail->Port = env('MAIL_PORT');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->addAddress(env('MAIL_TO_ADDRESS'), env('MAIL_TO_NAME'));
        $mail->Subject = 'Face Registration Confirmation';
        $mail->Body = "Hi $name, your face registration is successful. Thank you!";

        // Send the email
        if (!$mail->send()) {
            Log::error('Error sending email: ' . $mail->ErrorInfo);
        }
    }
}
