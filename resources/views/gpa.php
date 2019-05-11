
<!DOCTYPE html><html lang="en"><head><meta http-equiv="X-UA-Compatible" content="IE=Edge" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>GPA Calculators</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noarchive" /><!-- favicon.twig -->
<link rel="apple-touch-icon" sizes="180x180" href="//libapps.s3.amazonaws.com/apps/common/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="//libapps.s3.amazonaws.com/apps/common/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="//libapps.s3.amazonaws.com/apps/common/favicon/favicon-16x16.png">
<link rel="manifest" href="//libapps.s3.amazonaws.com/apps/common/favicon/site.webmanifest">
<link rel="mask-icon" href="//libapps.s3.amazonaws.com/apps/common/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="//libapps.s3.amazonaws.com/apps/common/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#ffc40d">
<meta name="msapplication-config" content="//libapps.s3.amazonaws.com/apps/common/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<!-- public_metadata.twig -->

    <!-- auto generated dublin core metadata -->
    <meta name="DC.Title" content="Guides: Study Rooms: Study Areas and Room Reservations"/>
    <meta name="DC.Creator" content="Allyson Palagi"/>
    <meta name="DC.Subject" content=""/>
    <meta name="DC.Description" content=""/>
    <meta name="DC.Publishers" content="Phillips Library"/>
    <meta name="DC.Rights" content="Copyright Phillips Library 2019"/>
    <meta name="DC.Language" content="en"/>
    <meta name="DC.Identifier" content="//libguides.aurora.edu/c.php?g=815489&p=5819718"/>
    <meta name="DC.Date.Created" content="Mar 1, 2018"/>
    <meta name="DC.Date.Modified" content="Feb 13, 2019"/>

		<meta property="og:title" content="Guides: Study Rooms: Study Areas and Room Reservations">
		<meta property="og:description" content="Guides: Study Rooms: Study Areas and Room Reservations">
		<meta property="og:type" content="website">
		<meta property="og:url" content="//libguides.aurora.edu/c.php?g=815489&p=5819718">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@springshare">
        <link rel="stylesheet" href="/web/jquery/css/jquery-ui.min.css?2695" />
        <link rel="stylesheet" href="/web/font-awesome/4.7.0/css/font-awesome.min.css" />
				<link rel="stylesheet" type="text/css" href="/web/slick-1.7.1/slick/slick.css">
				<link rel="stylesheet" type="text/css" href="/web/slick-1.7.1/slick/slick-theme.css">
            <link rel="stylesheet" href="/web/css1.29.4/lg-public.min.css" />
			    <script src="{{ asset('js/gpa.js') }}" defer></script>
    <script src="js/gpa.js" defer></script>
    <link rel="stylesheet" href="css/gpa_style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <link rel="stylesheet" href="{{ asset('css/gpa_style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/web/jquery/js/1.12.1_jquery.min.js"></script>    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        jQuery.ui || document.write('<script src="/web/jquery/js/jquery-ui.min.js?2695">\x3C/script>');
    </script>

            <script type="text/javascript" src="/web/js1.29.4/lg-public.min.js"></script>
		<style>/* =========================================== */
                        /* bootstrap overrides */
                        /* =========================================== */
                        #s-lg-tabs-container .nav-tabs > li > a,
                        #s-lg-tabs-container .nav-tabs > li > button,
                        #s-lg-tabs-container .nav-pills > li > a,
                        #s-lg-tabs-container .nav-pills > li > button {

                            border: 1px solid transparent;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            border-radius: 0;
                            background-color: #e8e8e8;
                            color: #01215c;
                            font-weight: bold;
                            padding: 4px 15px;
                        }
                        #s-lg-tabs-container .nav-tabs {
                            border-bottom: 0;
                        }
                        #s-lg-tabs-container .nav-tabs > li#s-lg-admin-tab-add > a {
                            -webkit-border-radius: 4px 4px 0 0;
                            -moz-border-radius: 4px 4px 0 0;
                            border-radius: 4px 4px 0 0;
                        }
                        #s-lg-tabs-container .nav-tabs > li > a:hover,
                        #s-lg-tabs-container .nav-tabs > li > button:hover,
                        #s-lg-tabs-container .nav-pills > li > a:hover,
                        #s-lg-tabs-container .nav-pills > li > button:hover {

                            border: 1px solid transparent;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            border-radius: 0;
                            background-color: #003591;
                            color: #ffffff;
                        }
                        #s-lg-tabs-container .nav-tabs > .active > a,
                        #s-lg-tabs-container .nav-tabs > .active > button,
                        #s-lg-tabs-container .nav-pills > .active > a,
                        #s-lg-tabs-container .nav-pills > .active > button {
                            color: #ffffff;
                            cursor: default;
                            background-color: #003591;

                            border: 1px solid transparent;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            border-radius: 0;
                            border-bottom-color: transparent;
                            font-weight: bold;
                        }
                        #s-lg-tabs-container .nav-tabs > .active > .s-lg-subtab-ul > .active > a,
                        #s-lg-tabs-container .nav-tabs > .active > .s-lg-subtab-ul > .active > button {
                            color: #ffffff;
                            cursor: default;
                            background-color: #003591;
                            border-bottom-color: transparent;
                        }
                        #s-lg-tabs-container .nav-tabs > .active > a:hover,
                        #s-lg-tabs-container .nav-pills > .active > a:hover,
                        #s-lg-tabs-container .nav-tabs > .active > button:hover,
                        #s-lg-tabs-container .nav-pills > .active > button:hover {
                            color: #ffffff;
                            cursor: pointer;
                            background-color: #003591;

                            border: 1px solid transparent;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            border-radius: 0;
                            border-bottom-color: transparent;
                            font-weight: bold;
                        }
                        #s-lg-tabs-container .nav .dropdown-toggle .caret {
                            border-top-color: #e1e1e1;
                        }
                        #s-lg-tabs-container .nav-tabs button.dropdown-toggle .caret {
                            margin-left: 2px;
                            margin-top: -3px;
                        }
                        #s-lg-tabs-container .nav-tabs > li > a.s-lg-tab-drop {
                            border-radius: 0;
                            padding: 4px 6px 4px 3px;
                            border-left: 1px solid transparent;
                        }
                        #s-lg-tabs-container .nav-tabs > li > button.s-lg-tab-drop {
                            border-radius: 0;
                            padding: 4px 6px 0px 3px;
                            border-left: 1px solid transparent;
                            margin-right: 2px;
                        }
                        #s-lg-tabs-container .nav-tabs > li > a.s-lg-tab-drop:hover {
                            border-radius: 0;
                            border-left: 1px solid #bbb;
                            padding: 4px 6px 4px 3px;
                        }
                        #s-lg-tabs-container .nav-tabs > li > button.s-lg-tab-drop:hover {
                            border-radius: 0;
                            border-left: 1px solid #bbb;
                            padding: 4px 6px 0px 3px;
                        }
                        #s-lg-tabs-container .nav-tabs > li > a.s-lg-tab-top-link,
                        #s-lg-tabs-container .nav-tabs > li > a.s-lg-tab-top-link:hover,
                        #s-lg-tabs-container .nav-tabs > li > button.s-lg-tab-top-link,
                        #s-lg-tabs-container .nav-tabs > li > button.s-lg-tab-top-link:hover {
                            border-radius: 0;
                            font-weight: bold;
                            padding: 4px 5px 4px 10px;
                        }
                        .nav-tabs > li > a.s-lg-tab-top-link,
                        .nav-tabs > li > button.s-lg-tab-top-link {
                            margin-right: 0px;
                        }

                        #s-lg-tabs-container .nav-pills > li > a.s-lg-tab-drop,
                        #s-lg-tabs-container .nav-pills > li > button.s-lg-tab-drop {
                            border-radius: 0;
                            padding: 4px 8px 4px 8px;
                            border-left: 1px solid transparent;
                            position: absolute;
                            right: 0;
                        }
                        #s-lg-tabs-container .nav-pills > li > a.s-lg-tab-drop:hover,
                        #s-lg-tabs-container .nav-pills > li > button.s-lg-tab-drop:hover {
                            border-radius: 0;
                            border-left: 1px solid #bbb;
                            padding: 4px 8px 4px 8px;
                        }
                        #s-lg-tabs-container .nav-pills > li > a.s-lg-tab-top-link,
                        #s-lg-tabs-container .nav-pills > li > a.s-lg-tab-top-link:hover,
                        #s-lg-tabs-container .nav-pills > li > button.s-lg-tab-top-link,
                        #s-lg-tabs-container .nav-pills > li > button.s-lg-tab-top-link:hover {
                            width: 100%;
                            float: left;
                            border-radius: 0;
                            font-weight: bold;
                            padding: 4px 15px 4px 15px;
                        }#s-lg-guide-tabs-title-bar { border-top: 1px solid #003591; }
                    .s-lib-box {
                        border-color: #cccccc;
                        border-width: 1px;
                        box-shadow: 0 8px 6px -6px #AAAAAA;border-radius: 0;
                        background-color: #fff;
                    }
                    .s-lib-box-std .s-lib-box-title {
                        background-color: #003591;background-image: none;
                        color: #ffffff;
                        border-bottom: 1px solid #cccccc;
                    }
                    .s-lib-box .s-lib-box-title {
                        background-color: #003591;background-image: none;
                        color: #ffffff;
                        border-bottom: 1px solid #cccccc;;
                        border-radius: 0;
                    }
                    .s-lib-box .s-lg-box-footer {
                    border-radius: 0;
                    }</style>
		<!-- BEGIN: CUSTOM HEAD SYSTEM JS/CSS -->
		<style>
/* moves slide out chat */
.lcs_slide_out-r{
	padding-top: 90px !important;
}
/* hides breadcrumbs */
#s-lib-bc {
	display: none;
}
/* hides line under page's title*/
#s-lg-guide-tabs-title-bar {
    border-top: 0px solid #31813a;
}

.navbarAU {
    background: #FFFFFF;
    border-top-style: solid;
    border-top-color: #31813a;
    border-top-width: 3px;
    padding-left: 0px;
    padding-right: 15px;
    font-size: 16px;
    border-radius: 0 !important;
  -moz-border-radius: 0 !important;
}

html {
	position: relative;
	min-height: 100%;
}

body {
	margin-bottom: 167px;
	padding-left: 15px;
	padding-right: 15px;
}

.footer {
	position: absolute;
	bottom: 0;
margin-left: -15px;
	width: 100%;
	height: 133px;
	padding-bottom: 15px;
	border-top: 3px solid #31813a;
	background-color: #1e357b;
	background:linear-gradient(#f2f2f2, #e6e6e6);
	color: #333;
	padding: 15px;
    line-height: .3;
}

footer a {
	color: #333;
  }
  footer a:hover {
	color: #48a948;
	text-decoration: none;
  }
.btn-phillipslib {
    background-color: #333333;
    color: #ffffff;
    border-color: #000000;
}

.btn-phillipslib:hover {
    background-color: #48a948;
    color: #ffffff;
    border-color: #31813a;
}

.btn-phillipslib:focus {
    background-color: #48a948;
    color: #ffffff;
    border-color: #31813a;
}


 #hoverFB {
   background-image: url('https://libapps.s3.amazonaws.com/accounts/108452/images/FB-FindUsonFacebook-online-144bw.png');
   width: 114px;
   height: 21px;
}

#hoverFB:hover {
	background-image: url('https://libapps.s3.amazonaws.com/accounts/108452/images/FB-FindUsonFacebook-online-144grn.png');
	width: 114px;
	height: 21px;
}
.s-lib-footer {
	height: 44px;
	margin-top: 15px;
	padding-bottom: 5px;
	border-top: 0px solid #bbb;
	background:linear-gradient(#e6e6e6, #d9d9d9);
	line-height: 1.75;
}

/* Small Devices, Tablets */
@media only screen and (max-width : 768px) {
    /* your mobile css, change this as you please */
body {
	margin-bottom: 370px;
	padding-left: 15px;
	padding-right: 15px;
}
}

@media only screen and (max-width : 768px) {
    /* your mobile css, change this as you please */
    .footer {
  position: absolute;
margin-left: -15px;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 360px;
font-size: .9em;
	padding-bottom: 5px;
	border-top: 3px solid #31813a;
	background-color: #1e357b;
	background:linear-gradient(#f2f2f2, #e6e6e6);
	color: #333;
	padding: 15px;
    line-height: .3;
}
}
</style>
		<!-- END: CUSTOM HEAD SYSTEM JS/CSS -->
		<!-- BEGIN: CUSTOM HEAD GUIDE JS/CSS -->
		<style>
.slick-prev::before, .slick-next::before {

    color: black;
    display: none;

}
</style>
		<!-- END: CUSTOM HEAD GUIDE JS/CSS -->
		<script>
var springStats = springStats || {};
springStats.saConfig = springStats.saConfig || {
    site_id: 479,
    tracking_parameters: {"_st_guide_id":815489,"_st_page_id":5819718,"_st_site_id":479},
    tracking_server_host: "libguides-proc.springyaws.com"
};
</script>
<script async  src="/web/js/sa.min.js?3116"></script>
		<script>
			springSpace.Common = springSpace.Common || { };
			springSpace.Common.constant = {
					PROCESSING: {
						ACTION_DISPLAY_POLL: 159
					}
			};
			springSpace.Common.baseURL = "//libguides.aurora.edu/";
			handleScroll=function() {
				var target_elt = "";
				var anchor = window.location.hash.substring(1);

				if (jQuery.isNumeric(anchor)) {
					xhr = jQuery.ajax({
						async: false,
						url: "/content_process.php",
						type: "POST",
						dataType: "json",
						data: {
							action: 562,
							anchor: anchor
						},
						success: function(response, textStatus, jqXHR) {
							if ((response.data.box_id != 0) && jQuery("#s-lg-box-" + response.data.box_id)) {
								target_elt = "#s-lg-box-" + response.data.box_id;
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {

						}
					});
				}
				else if (false) {
					target_elt = "#s-lg-page-section-5819718";
				}

				if (target_elt != "") {
					jQuery("html, body").animate({ scrollTop: jQuery(target_elt).offset().top }, 750);
					if (jQuery(this).scrollTop() > 220) {
						jQuery("#s-lib-scroll-top").fadeIn(750);
					}
				}
			}
	   </script>
        <script>
            // Enable tooltips.
            jQuery(function () {
                try {
                    springSpace.UI.initPopOvers();
                    jQuery(".az-bs-tooltip").tooltip();
                } catch (e) { }
            });jQuery(window).on('load', function() {springSpace.springTrack.trackPage({_st_type_id: '1',_st_group_id: '16765',_st_guide_id: '815489',_st_page_id: '5819718'});});
            jQuery(document).ready(function() {
                handleScroll();
            });
        </script>
		<!-- BEGIN: Analytics code --><!-- Global site tag (gtag.js) - Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-108777575-1"></script><script>  window.dataLayer = window.dataLayer || [];  function gtag(){dataLayer.push(arguments);}  gtag('js', new Date());  gtag('config', 'UA-108777575-1');</script> <meta name="google-site-verification" content="F7IOQOaasqeJOp0-cssTbH2Srex4E4dpInuhI7Kds0o" /><!-- END: Analytics code --></head><body class="s-lg-guide-body">

        <!-- BEGIN: Page Header -->
        <div class="row"
<div class="container-fluid">
<a href="http://aurora.edu/library">
<picture>
    <source srcset="https://libapps.s3.amazonaws.com/accounts/108452/images/Library_Banner_7b.png" type="image/png" media="(min-width: 768px)" />
    <source srcset="https://libapps.s3.amazonaws.com/accounts/108452/images/2018-03-02_1204.png" type="image/jpeg" />
    <img src="https://libapps.s3.amazonaws.com/accounts/108452/images/Library_Banner_7b.png" class="img-responsive" alt="Phillips Library Banner">
</picture>
</a>
</div>
</div>
<div class="row">
<nav class="navbarAU navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#AUNav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    </div>
    <div id="AUNav" class="collapse navbar-collapse">
     <ul class="nav navbar-nav">
      <li><a href="https://aurora.edu/academics/library/index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="http://libguides.aurora.edu/research"><span class="glyphicon glyphicon-search"></span> Research</a></li>
      <li><a href="http://aurora.libanswers.com/"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
      <li class="active"><a href="http://libguides.aurora.edu/libraryinfo"><span class="glyphicon"></span> Library Information</a></li>
         </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Accounts
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="https://i-share.carli.illinois.edu/vf-aru/MyResearch/Home">I-Share</a></li>
          <li><a href="https://787.account.worldcat.org/profile">Tipasa</a></li>
          </ul>
        </ul>
      </li>
    </ul>
  </div>
  </div>
</nav></div>
<br />
        <!-- END: Page Header -->
        <!-- BEGIN: Guide Info Header -->
        <div id="s-lg-guide-header" class="container s-lib-header s-lib-side-borders">
            <div id="s-lib-bc">

			<ol id="s-lib-bc-list" class="breadcrumb">

					<li id="s-lib-bc-customer">
						<a title="Phillips Library"  href="http://www.aurora.edu/academics/library/index.html">Phillips Library
						</a>
					</li>
					<li id="s-lib-bc-site">
						<a title="Guides"  href="//libguides.aurora.edu/">Guides
						</a>
					</li>
					<li id="s-lib-bc-group">
						<a title="Library Information"  href="//libguides.aurora.edu/testing">Library Information
						</a>
					</li>
					<li id="s-lib-bc-guide">
						<a title="Study Rooms"  href="//libguides.aurora.edu/studyrooms">Study Rooms
						</a>
					</li>
					<li id="s-lib-bc-page" class="active">Study Areas and Room Reservations
					</li>
			</ol>
            </div>
			<div class="pull-right">


			</div>
            <div id="s-lg-guide-header-info">
                <h1 id="s-lg-guide-name">Calculators</h1>
                <div id="s-lg-guide-desc-container" class="pad-top-med">
                    <span id="s-lg-guide-description"></span>
                </div>
            </div>
        </div>
        <!-- END: Guide Info Header -->
        <div id="s-lg-tabs-container" class="container s-lib-side-borders pad-top-med">
            <div id="s-lg-guide-tabs" class="tabs">
                <ul class="nav nav-tabs split-button-nav">

                </ul>
            </div>
        </div>
        <div id="s-lg-guide-tabs-title-bar" class="container s-lib-side-borders"></div>
        <!-- BEGIN: Guide Content -->
        <div id="s-lg-guide-main" class="container s-lib-main s-lib-side-borders">

				<div class="row s-lg-row">
    <div id="s-lg-col-126" class="col-md-12">
        <div class="s-lg-col-boxes">
        </div>
    </div>

</div>
				<div class="row s-lg-row">
    <div id="s-lg-col-1" class="col-md-4">
        <div class="s-lg-col-boxes">
							<div id="s-lg-box-wrapper-24197577" class="s-lg-box-wrapper-24197577">
					<div id="s-lg-box-20622137-container" class="s-lib-box-container">
						<div id="s-lg-box-20622137" class="s-lib-box s-lib-box-std s-lib-floating-box">

							<div id="s-lg-box-collapse-20622137" >
								<div class="s-lib-box-content s-lib-floating-box-content">

			<div id="s-lg-content-46186158" class="  clearfix">
				<h2>Calculator Guidelines</h2>
		   </div>
			 <div id="warning">
				 WARNING! This calculator is not tied to the Aurora University student records system. The results are based only on the data you supply.
			 </div>
								</div>

							</div>
						</div>
					</div>
							</div>
							<div id="s-lg-box-wrapper-21684185" class="s-lg-box-wrapper-21684185">
					<div id="s-lg-box-18463665-container" class="s-lib-box-container">
						<div id="s-lg-box-18463665" class="s-lib-box s-lib-box-std s-lib-floating-box">

							<div id="s-lg-box-collapse-18463665" >
								<div class="s-lib-box-content s-lib-floating-box-content">

			<div id="s-lg-content-40654912" class="  clearfix">

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
					 <div class="panel-heading">
						 <h4 class="panel-title">
							 <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
							 Contact My Advisor</a>
						 </h4>
					 </div>
					 <div id="collapse0" class="panel-collapse collapse">
						 <div class="panel-body">
							 <h4>Online</h4>
							 Advisor info.

							 <h4>Graduate</h4>
							 Advisor info.

							 <h4>Undergraduate</h4>
							 Advisor info.
						 </div>
					 </div>
					</div>

		<div class="panel panel-default">
		 <div class="panel-heading">
			 <h4 class="panel-title">
				 <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
				 What is the difference between a term and your cumulative GPA?</a>
			 </h4>
		 </div>
		 <div id="collapse1" class="panel-collapse collapse">
			 <div class="panel-body">Your term/semester GPA is the grade point average
				 that you earned for a single semester or “term”, so it is the numerical
				 weighted average of your class grades. Your cumulative grade point average
				 is the numerical weighted average of the grades you’ve earned over your
				 entire college career at Aurora University.</div>
		 </div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					Credits/Hours</a>
				</h4>
			</div>
			<div id="collapse2" class="panel-collapse collapse">
				<div class="panel-body">Enter the total number of credit hours that your
					class is worth in the Credits/Hours field. A typical class is 4 credit
					hours, but there are a lot of variations including labs, music, activity
					 courses. If you aren’t sure how many credit hours your class is worth,
					 check the course syllabus or in web advisor click on “my schedule” and
					 your current class list will include credit hours. </div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					Transfer Students</a>
				</h4>
			</div>
			<div id="collapse3" class="panel-collapse collapse">
				<div class="panel-body">While the credit hours for courses you earned at
					other institutions transfer to AU, your grade point average from your
					former school does not. </div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					New Students</a>
				</h4>
			</div>
				<div id="collapse4" class="panel-collapse collapse">
		      <div class="panel-body">If you have been enrolled at AU for only one
		        semester, you will not have a cumulative GPA until after you complete
		        the semester.  In this case, your term GPA for your first semester is
		        equivalent to your cumulative GPA.</div>
		    </div>
		  </div>

</div>
        <h4>Term (Semester) GPA Calculator</h4>
				<ul>
	<li>This calculator is not intended to be used for checking your current GPA. It should only be used to help predict your GPA for the semester.
      Enter the name or course code, anticipated letter grade (from the drop down menu) and credit hours you have earned or expect to earn from each class. If you are repeating the course you need to click the box. The quality points will automatically calculate as will your projected grade point average for the semester.</li>
    </ul>
      <h4>Cumulative GPA Calculator</h4><ul>
  <li>Students may use this calculator to estimate the outcome of this semester's grades on their overall Aurora University cumulative grade point average. To calculate your anticipated new cumulative GPA, enter in your GPA prior to the current semester and total number of graded credit hours from all previous semesters at AU. Your cumulative GPA and total credits you have earned to date can be found can be found on web advisor under “transcript” Choose undergraduate or graduate, but not both for the purpose of this calculator. </li>
</ul>

		   </div>
								</div>

							</div>
						</div>
					</div>
							</div>
        </div>
    </div>
    <div id="s-lg-col-2" class="col-md-8">
        <div class="s-lg-col-boxes">
							<div id="s-lg-box-wrapper-22971930" class="s-lg-box-wrapper-22971930">
					<div id="s-lg-box-19578660-container" class="s-lib-box-container">
						<div id="s-lg-box-19578660" class="s-lib-box s-lib-box-std s-lib-floating-box">

							<div id="s-lg-box-collapse-19578660" >
								<div class="s-lib-box-content s-lib-floating-box-content">

				<h2>Term Calculation</h2>

<hr />
			<div id="s-lg-content-43703457" class="  clearfix">
        <div id="term" class="tab-pane active" >
        <div class="form-group">
							<h2 class="togLabel" for="togLabel">Cumulative</h2>
	            <label class="switch">
	                <input id="cumulative_button" onclick="toggler(this.id)"  type="checkbox">
	                <span class="slider"></span>
	            </label>
        <form id="myform" name="myform">

          <div class="cumulative" id="cumulative">
						<div class="row">
							<h3>Projected Cumulative GPA</h3>
						</div>
						<div id="cu_pr_inputs">
					<div class="col-3">
							<h5>Current Cumulative GPA</h5>
							<input id="pastgpa" name="pastgpa" class="pastgpa form-control amount" placeholder="Cumulative GPA" value="" />
								<span class="focus-border"></span>
						</div>
						<div class="col-3">
							<h5>Credits Completed</h5>
								<input id="credtaken" name="credtaken" class="credtaken form-control amount" placeholder="Credits Completed" value="" />
									<span class="focus-border"></span>
							</div>
							<h1 class="descript">This allows you to calculate your cumulative GPA, which takes into account your past GPA and total credit hours and uses your current term to calculate your GPA.  You can find your current GPA and credit hours in WebAdvisor by using the "Grade Point Average by Term" link under the Academic Profile menu.<hr></h1>

							<hr/>
							<div class="cu_box" id="cu_box"></div>
							<h4><div id="cred_box" class="cred_box"></div></h4>
						</div>
          </div>

           <table id="t1" class="table table-bordered">
             <thead>
               <tr>
                 <th style="width: 5%" scope="col"><div class="defo">Remove<span class="defotext">Remove an added course.</span></div></th>
                 <th style="width: 20%"scope="col"><div class="defo">Course<span class="defotext">The name of the course.  For example, Math1010.</span></div></th>
                 <th style="width: 20%" scope="col"><div class="defo">Anticipated Grade<span class="defotext">The grade you expect to achieve in the course.</span></div></th>
                 <th style="width: 15%" scope="col"><div class="defo">Credits<span class="defotext">The amount of credit hours of the course.</span></div></th>
                 <th><div class="defo">Repeat<span class="defotext">Check the box if you have previously taken this course.</span></div></th>
                 <th style="width: 20%" scope="col"><div class="defo">Quality Points<span class="defotext">This is determined by multiplying the amount of credit hours and the value of the grade.</span></div></th>
               </tr>
             </thead>

              <tr class="item">
                 	<td>
                 	</td>

                  <td><input name="course" class="form-control" value="" placeholder="Class Name"/></td>

                  <td>
                 	<select id="currentgrade" class="currentgrade amount form-control" >
                    <option id="def1" value="default">Grade</option>
                 		<option value="4">A</option>
                 		<option value="3">B</option>
                 		<option value="2">C</option>
                    <option value="1">D</option>
                    <option value="0">F</option>
                    <option value="0">NCR</option>
                    <option value="100">I</option>
                    <option value="100">W</option>
                    <option value="100">X</option>
                    <option value="100">CR</option>
                  </select>
                 	</td>

                 	<td>
                 	<select id="credithours" class="credithours amount form-control" >
                    <option id="def2" value="default" selected>Hours</option>
                 		<option value=".5">.5</option>
                 		<option value="1">1</option>
                 		<option value="2">2</option>
                 		<option value="3">3</option>
                 		<option value="4">4</option>
                 		<option value="5">5</option>
                 		<option value="6">6</option>
                 		<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
                 	</select>
                 	</td>

                  <td class="repeat_options">
                    <input type="checkbox" class="btn_repeat" id="0" val="0">
                    <select id="g0" class="previousgrade amount grds form-control"></select>
                  </td>

                  <td><input name="total" class="total form-control" id="total1" value="" readonly="readonly" /></td>
             </tr>
           </table>

           <div class="form-actions">
             <input type="button" value="Add Course" class="btn btn-success addRow" />
             <input type="reset" value="Reset Fields" onclick="resetform()" class="btn btn-success" />
             <hr/>
             <div class="outputcontainer">
               <div class="left-half">
                 <article>
                   <h1 class="head_out">Term GPA</h1>
                   <div id="show_box" class="show_box">0.00</div>
                 </article>

               </div>
               <div class="right-half">
                 <article>
                   <h1 class="head_out">Credits</h1>
                   <div id="term_cred" class="term_cred">0.00</div>
                 </article>
               </div>
             </div>
             <br/>
           </div>

        </div>
      </div>
        <hr/>
        <div id="output_container">
          <h3>Goal Cumulative GPA</h3>
          <div id="cu_pr_inputs">
        <div class="col-3">
          <input id="targetgpa" name="targetgpa" placeholder="GPA" class="targetgpa amount form-control" type="number" value=""/>
              <span class="focus-border"></span>
          </div>
          <div class="col-3">
              <input id='credleft' class="credleft form-control amount" placeholder="Credits Remaining" type="number" value=""/>
                <span class="focus-border"></span>
            </div>
            <hr/>
            <h4><div class="proj_box" id="proj_box"></div></h4>
          </div>
        </div>
			</form>


		   </div>
       <br/>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Undergraduate Grading System - Letter Grades</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
          A (4 quality points per semester hour) Denotes performance that consistently
          exceeds expectations and demonstrates comprehensive understanding of the
          subject.
          <br/><br/>
          B (3 quality points per semester hour) Denotes performance that meets
           and at times exceeds expectations and indicates good preparation in the subject.
					<br/><br/>
          C (2 quality points per semester hour) Denotes performance that meets
          expectations and demonstrates adequate preparation in the subject.
          <br/><br/>
          D (1 quality point per semester hour) Denotes performance that is
          inadequate or inconsistently meets expectations and makes it inadvisable
          to proceed further in the subject without additional work.
          <br/><br/>
          F (0 quality points per semester hour) Failure. Denotes performance that
          consistently fails to meet expectations.
          <br/><br/>
          CR (quality points not calculated in grade point average) Pass. Denotes pass
           with credit at least at the level of “C” work, in courses that are graded
           CR/NCR.
           <br/><br/>
          NCR (0 quality points per semester hour) No credit. Denotes work that
          fails to meet college or university standards for academic performance at least at the level of “C” work.
  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        Graduate Grading System - Letter Grades</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
      <div class="panel-body">
            A  (4 quality points per semester hour) Excellent. Denotes work that
             is consistently at the highest level of achievement in a graduate
             college or university course.
            <br/><br/>
            B  (3 quality points per semester hour) Good. Denotes work that
            consistently meets the high level of college or university standards
            for academic performance in a graduate college or university course.
            <br/><br/>
            C  (2 quality points per semester hour) The lowest passing grade. Denotes
            work that does not meet in all respects college or university standards
            for academic performance in a graduate college or university course.
            <br/><br/>
            F  (0 quality points per semester hour) Failure. Denotes work that
            fails to meet graduate college or university standards for academic
            performance in a course.
            <br/><br/>
            CR  (Quality points are not calculated in grade point average) Pass.
             Denotes pass with credit at least at the level of “C” work, in graduate
             courses that are graded CR/NCR.
             <br/><br/>
            NCR (0 quality points per semester hour) No credit. Denotes work that
            fails to meet graduate college or university standards for academic performance at least at the level of “C” work.
</div>
    </div>
  </div>


</div>

								</div>

							</div>
						</div>
					</div>
							</div>
        </div>
    </div>

</div>
				<div class="row s-lg-row">
    <div id="s-lg-col-127" class="col-md-12">
        <div class="s-lg-col-boxes">
        </div>
    </div>

</div>

        </div>
        <!-- END: Guide Content -->


			<div id="s-lib-alert" title="">
                            <div id="s-lib-alert-content"></div>
                       </div>
	</body></html>
