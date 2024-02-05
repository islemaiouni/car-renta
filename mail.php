<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail From Localhost | CodingNepal</title>
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* custom css styling */
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        html,body{
            background: #007bff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        ::selection{
            color: #fff;
            background: #007bff;
        }
        .container{
            padding: 20px;
        }
        .mail-form {
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                        0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 20px;
        }
        .contact-details {
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                        0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 20px;
        }
        .contact-details img {
            max-width: 100%;
            height: auto;
        }
        @media (min-width: 768px) {
            .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-details">
                    <img src="car_image.jpg" alt="Car Image">
                    <p>Some small write-up about contacting, tips, or any other information can go here.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mail-form">
                    <h2 class="text-center">Send Message</h2>
                    <p class="text-center">Send mail to anyone from localhost.</p>
                    <?php
                        $recipient = "";
                        if(isset($_POST['send'])){
                            $recipient = $_POST['email'];
                            $subject = $_POST['subject'];
                            $message = $_POST['message'];
                            $sender = "From: your@example.com";
                            if(empty($recipient) || empty($subject) || empty($message)){
                    ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo "All inputs are required!" ?>
                                </div>
                    <?php
                            } else {
                                if(mail($recipient, $subject, $message, $sender)){
                    ?>
                                    <div class="alert alert-success text-center">
                                        <?php echo "Your mail successfully sent to $recipient"?>
                                    </div>
                    <?php
                                $recipient = "";
                                } else {
                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?php echo "Failed while sending your mail!" ?>
                                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $recipient ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" type="text" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
