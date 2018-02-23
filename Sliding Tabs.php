<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Sliding Tabs</title>
    <script src="Sliding Tabs_files/mootools.js" type="text/javascript"></script>
	<script src="Sliding Tabs_files/sliding-.js" type="text/javascript"></script>

	
	<style type="text/css" media="screen">
	  body,div,dl,dt,dd,ol,ul,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td {
margin: 0;
padding: 0;
}
	  
		html { font-size: 13px; font-family: "Lucida Grande", Verdana, Arial, sans-serif; }
		#heading {
			display: block;
			text-align: center;
			margin-bottom: 1em;
		}
		#heading * {
			display: inline;
			padding: 4px;
			user-select: none;
			cursor: pointer;
			vertical-align: middle;
		}
		#heading li.active {
			background-color: #66ccff;
			border-radius: 3px;
			-webkit-border-radius: 3px;
			-opera-border-radius: 3px;
			-moz-border-radius: 3px;
		}
		#panes {
			text-align: justify;
			border-style: none;
			width: auto;
			margin: 0 auto 0 auto;
		}
		
		#panes div div { overflow: hidden; }
		
		#previous { float: none; cursor: pointer; }
		#next { float: none; cursor: pointer; }
		</style>
</head>
<body>
	<div id="wrapper">
		<div id="heading" style="text-align:right">
			
			<ul id="buttons" style="display:none">
				<li>Alpha</li>
				<li>Beta</li>
				<li>Gamma</li>
				<li>Delta</li>
				<li>Epsilon</li>
			</ul>
			<img src="Sliding Tabs_files/leftAlt3.png" alt="" id="previous" style="border-width: 0px" /><img src="Sliding Tabs_files/rightAlt.png" alt="" id="next" style="border-width: 0px" />
		</div>
		
		<!-- this section has our panes, unfortunately we need two divs to make the effect work -->
		<div id="panes">
			<div id="content">
				<div>
					<p>This is a demo for the donationware Sliding Tabs script by Jenna Fox. You can click the links at the top or use the arrows to move to different panes. If you dig the effect, go check out <a href="http://creativepony.com/journal/scripts/sliding-tabs/">the docs</a>, and if you use it, make sure to <a href="http://creativepony.com/#support">donate something</a>! Oh and if you need any help getting the script set up, feel free to drop me a <a href="http://creativepony.com/#contact">message</a>.</p>
				</div>
				<div>
					<p>This is the second. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Check out <a href="http://creativepony.com/journal/scripts/sliding-tabs/">the docs</a>.</p>
				</div>
				<div id="third">
					<p>And the third. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Check out <a href="http://creativepony.com/journal/scripts/sliding-tabs/">the docs</a>.</p>
				</div>
				<div>
					<p>The Fourth. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Check out <a href="http://creativepony.com/journal/scripts/sliding-tabs/">the docs</a>.</p>
				</div>
				<div>
					<p>And now, finally, page five! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Check out <a href="http://creativepony.com/journal/scripts/sliding-tabs/">the docs</a>.</p>
				</div>
			</div>
		</div>
		
		<p style="font-weight: bold">Here is a bit of text to show off the newly added feature of resizing the widget’s height to fit it’s content.</p>
	</div>
	
	<script type="text/javascript" charset="utf-8">
		window.addEvent('load', function () {
			slidingtabs = new SlidingTabs('buttons', 'panes');
			
			// this sets up the previous/next buttons, if you want them
			$('previous').addEvent('click', slidingtabs.previous.bind(slidingtabs));
			$('next').addEvent('click', slidingtabs.next.bind(slidingtabs));
		});
	</script>
</body>
</html>
<!-- This document saved from http://creativepony.com/demos/sliding-tabs/ -->
