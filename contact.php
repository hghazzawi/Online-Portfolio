<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/php-contact-form-tutorial.html
*/
require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('ghazzawi95@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('n91LqHNvMrpoXte');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hasan Ghazzawi | Contact </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="content description">
    <meta name="author" content="mustachethemes">

    <!-- Your Styles
    ================================================== -->
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="js/twitter/jtwt.css" />

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/icons/favicon.ico">
    <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">
	
	

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/font-awesome-ie7.css">
    <![endif]-->

    <!-- styles for IE -->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen"/>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

</head>
<body>

<div id="main_container">
    <!--Begin header-->
    <header>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content_menu wrap">
                        <div class="box span2 offset0 color_one resume">
                            <h1><a href="index.html">Hasan Ghazzawi</a></h1>

                                    <p>
                                        I’m a Graphic Designer, Coder & Entrepreneur.<br>
                                        Take a look at my portfolio to see what I was working.
                                    </p>
                                    <div class="resume_button btn-sample btn-large">
                            			<a href="resume.pdf"><i class="icon-white icon-download"></i> Resume</a>                                	</div>
                                	<div class="contact_button btn-sample btn-large">
                                    	<a href="contact.html"><i class="icon-white icon-info"></i>contact</a>
                                	</div>
                        </div>
                        <!-------------content menu---------------------------->
                        <nav class="navbar span3">
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                <li class="menu_item"><a href="profile.html">profile </a></li>
                                <li class="menu_item"><a href="education.html">education </a></li>
                                <li class="menu_item"><a href="portfolio.html">portfolio </a></li>
                                <li class="menu_item"><a href="experience.html">experience </a></li>
                                <!--<li class="menu_item"><a href="blog.html">blog </a></li>-->
                                <li class="menu_item"><a href="contact.html">contact </a></li>
                            </ul>
                            </div>

                        </nav>
                        <!-------------end content menu------------------------>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!--End begin header-->
    
    <!--Begin content main-->
    <section id="content" class="contact">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="wrap">
                        

                        <div class="content_main span12">
                        
                        	<h2 class="sub_title"> Contact Page<span class="little_title"> - Feel free to contact me</span></h2>
                            
                            
                            <div class="services_content row-fluid">
                                <div class="alignleft span3 form_content_contact">
                                  <h5>Send me a message </h5>
								  
                                    <form action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                                        <fieldset>
											<input class="input-block-level" type='hidden' name='submitted' id='submitted' value='1'/>
											<input class="input-block-level" type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
											<input class="input-block-level" type='hidden'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
                                            <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
											<input type="text" style="width:50%" id="name" name="name" class="input-block-level" value='<?php echo $formproc->SafeDisplay('name') ?>' placeholder="Name">
                                            <input type="text" style="width:50%" id="email" name="email" class="input-block-level" value='<?php echo $formproc->SafeDisplay('email') ?>' placeholder="Email">
                                            
											<textarea rows="3" style="width:50%" id="description" name="description" class="input-block-level" placeholder="Description"><?php echo $formproc->SafeDisplay('description') ?></textarea>
                                            <div class='container'>
												<div><img style="height:100px;width:300px" alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
												<label for='scaptcha' >Enter the code above here:</label>
												<input type='text' name='scaptcha' id='scaptcha' maxlength="10" /><br/>
												<span id='contactus_scaptcha_errorloc' class='error'></span>
												<div class='short_explanation'>Can't read the image?
												<a href='javascript: refresh_captcha_img();'>Click here to refresh</a>.</div>
											</div>
											
											<button type="submit" class="last_button btn btn-warning pull-right btn-sample btn-large">Send Email</button>
                                            <button type="reset" class="btn btn-warning pull-right btn-sample btn-large">Clean</button>

                                        </fieldset>
                                    </form>
									<script type='text/javascript'>
									// <![CDATA[

										var frmvalidator  = new Validator("contactus");
										frmvalidator.EnableOnPageErrorDisplay();
										frmvalidator.EnableMsgsTogether();
										frmvalidator.addValidation("name","req","Please provide your name");

										frmvalidator.addValidation("email","req","Please provide your email address");

										frmvalidator.addValidation("email","email","Please provide a valid email address");

										frmvalidator.addValidation("description","maxlen=2048","The message is too long!(more than 2KB!)");


										frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

										document.forms['contactus'].scaptcha.validator
										  = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
														document.images['scaptcha_img']);

										function SCaptcha_Validate()
										{
											return document.forms['contactus'].scaptcha.validator.validate();
										}

										frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

										function refresh_captcha_img()
										{
											var img = document.images['scaptcha_img'];
											img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
										}

									// ]]>
									</script>
                                </div>
                                <div class="content_address alignright span2">
                                    <h5>Get in Touch</h5>
                                    <p>
                                        I'm always open to conversation or any inquiries so feel free
                                        to send me a contact form to ask any questions.
                                    </p>
                                    
                                </div>


                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End begin content main-->

    <!--Begin footer-->
    <footer>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="wrap">
                        <div class="content_footer span12">
                            <hr>
                            <div class="span2">
                                2015 My Online Resume. All rights reserved
                            </div>
                            <div class="span3 offset0">
                                <ul class="social-circled">
                                    <li class="color_ten social">
                                        <a class="icon-gplus-circled" href="#googleplus"></a>
                                    </li>
                                    <li class=" color_ten social ">
                                        <a class="icon-pinterest-circled" href="#googleplus"></a>
                                    </li>
                                    <li class="color_ten social ">
                                        <a class="icon-twitter-circled" href="#googleplus"></a>
                                    </li>
                                    <li class="color_ten social ">
                                        <a class="icon-linkedin-circled " href="#googleplus"></a>
                                    </li>
                                    <li class="color_ten social ">
                                        <a class="icon-facebook-circled" href="#googleplus"></a>
                                    </li>
                                    <li class="color_ten social ">
                                        <a class="icon-skype-circled" href="#googleplus"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>
    <!--End begin footer-->
</div>

<!-- ======================= JQuery libs =========================== -->
    <!-- Always latest version of jQuery-->
    <script src="js/jquery-1.7.1.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>-->
    <!-- Bootstrap.js-->
    <script src="js/bootstrap.js"></script>
    <!--fUNCTIONS-->
    <script src="js/js.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/twitter/jquery.jtwt.js"></script>
    <script src="js/filter/quiksand.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-func.js"></script>
<!-- ======================= End JQuery libs =========================== -->

</body>
</html>