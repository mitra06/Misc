<?php

        if(isset($_POST['submit']))
        {
        $name=($_POST['name']);
        $email=($_POST['email']);
        $phone=($_POST['phone']);
        $messages=strip_tags($_POST['message']);
        //The form has been submitted, prep a nice thank you message
        $output = '<h1>Thanks for your file and message!</h1>';
        //Set the form flag to no display (cheap way!)
     

        //Deal with the email
        $to = 'mitramishra93@gmail.com;
        $subject = 'New Attachement Received';


        $message .="<h5>Name: $name</h5>";
echo "<br />";
        $message .= "<h5>Email: $email</h5>";
        $message .= "<h5>Phone: $phonel</h5>";
        $message .= "<h5>Messages: $messages</h5>";
        $attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
        $filename = $_FILES['file']['name'];

        $boundary =md5(date('r', time())); 

        $headers = "From: name@sourcewebsite.com\r\nReply-To: ,mitramishra93@gmail.com";
        $headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

        $message="This is a multi-part message in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";

        mail($to, $subject, $message, $headers);
    }



   ?>
