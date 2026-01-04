<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Detalii pentru email
    $to = "xyz@example.com";  // Schimbă cu adresa ta de email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Contenutul emailului
    $body = "<html><body>";
    $body .= "<h2>Mesaj din Formularul de Contact</h2>";
    $body .= "<p><strong>Nume:</strong> " . $name . "</p>";
    $body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $body .= "<p><strong>Subiect:</strong> " . $subject . "</p>";
    $body .= "<p><strong>Mesaj:</strong><br>" . nl2br($message) . "</p>";
    $body .= "</body></html>";

    // Trimite emailul
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Mesajul a fost trimis cu succes!</p>";
    } else {
        echo "<p>Eroare la trimiterea mesajului. Te rugăm să încerci din nou.</p>";
    }
}
?>
