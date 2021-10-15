<?php

namespace Bosqu\EvaluationForum\Controller;

class TokenController
{

    public function generate (int $length = 32, bool $removeSimilarCharacters = true): string
    {
        $token = "";
        try {
            $bytesWithMargin = random_bytes($length*3);

            $base64 = base64_encode($bytesWithMargin);
            $purified = preg_replace("/[+=\/.]/", "", $base64);

            if ($removeSimilarCharacters){
                $purified = preg_replace("/[I1l0Oo]/", "", $purified);
            }

            $token = substr($purified, 0, $length);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $token;
    }

    /**
     * Send a new email to user for validation
     * @param $to
     * @param $token
     * @return bool
     */
/*
    public function sendToken($to, $token): bool
    {
        $subject = 'Forum, validation de compte.';
        $message = 'Lien de validation de votre compte: 
            <a href="http://localhost:8000/Controller/TokenValidationController.php?token='.
            $token .
            '">Valider mon compte!</a>';
        $headers = 'From: ForumWebmaster@email.com' . "\r\n" .
            'Reply-To: ForumWebmaster@email.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $succes = mail($to, $subject, $message, $headers);

        return $succes;
    }
*/
}