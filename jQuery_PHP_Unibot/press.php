<?php
require 'index.php';
//SELECT * FROM `ques_ans` WHERE Question REGEXP '(^what[ ]|[ ]what[ ]|[ ]what$){1,}.*(^of[ ]|[ ]of[ ]|[ ]of$){1,}.*(^address[ ]|[ ]address[ ]|[ ]address$){1,}'
//SELECT (SELECT count(*) FROM `ques_ans` WHERE Question REGEXP '^what[ ]|[ ]what[ ]|[ ]what$') as what,(SELECT count(*) FROM `ques_ans` WHERE Question REGEXP '^of[ ]|[ ]of[ ]|[ ]of$') as of, (SELECT count(*) FROM `ques_ans` WHERE Question REGEXP '^address[ ]|[ ]address[ ]|[ ]address$') as address
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css/combined.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
		<![endif]-->
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css">
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css">
		<![endif]-->
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/ie6.css">
		<![endif]-->
		<title>Copyscape - Press</title>
	</head>

	<body>
		<div class="container_12">
			

			<div id="logo_small">
				<a href="./"><img src="img/copyscape-logo-small.png" alt="Copyscape"></a>
			</div>


			<div id="nav">
				<ul>
					<li>
						<a class="home_icon" href="./">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
						<ul>
							<li>
								<a href="about.php">About Copyscape</a>
							</li>
							<li>
								<a href="press.php">Press</a>
							</li>
							<li>
								<a href="testimonials.php">Testimonials</a>
							</li>
							<li>
								<a href="terms.php">Terms of Use</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="products.php">Products</a>
						<ul>
							<li>
								<a href="premium.php">Copyscape Premium</a>
							</li>
							<li>
								<a href="api-guide.php">Premium API</a>
							</li>
							<li>
								<a href="copysentry.php">Copysentry</a>
							</li>
							<li>
								<a href="compare.php">Free Comparison Tool</a>
							</li>
							<li>
								<a href="banners.php?o=m">Free Plagiarism Banners</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="plagiarism.php">Plagiarism</a>
						<ul>
							<li>
								<a href="plagiarism.php">About Plagiarism</a>
							</li>
							<li>
								<a href="prevent.php">Preventing Plagiarism</a>
							</li>
							<li>
								<a href="respond.php">Responding to Plagiarism</a>
							</li>
							<li>
								<a href="resources.php">Online Resources</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="faqs.php">Help</a>
						<ul>
							<li>
								<a href="faqs.php">FAQs</a>
							</li>
							<li>
								<a href="forum.php">Forum</a>
							</li>
							<li>
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="signup.php?pro=1&o=m">Sign&nbsp;up</a>
						<ul>
							<li>
								<a href="signup.php?pro=1&o=m">Copyscape Premium</a>
							</li>
							<li>
								<a href="signup.php?pro=0&o=m">Copysentry</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="login.php" id="login">Log&nbsp;in</a>
					</li>

				</ul>
			</div>
			
			<div id="page_title">
				<h1>Press</h1>
			</div>

	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://online.wsj.com/public/article/SB116640468524853020-Vvad___NNZP5t2TzfSNxAxbwGAo_20071217.html?mod=rss_free"><img src="img/press-wsj-new.png" width="300" height="44"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;See whether text is duplicated elsewhere on the Web.&rdquo;
						<br/>
						<a href="http://online.wsj.com/public/article/SB116640468524853020-Vvad___NNZP5t2TzfSNxAxbwGAo_20071217.html?mod=rss_free">The Wall Street Journal</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.bbc.com/news/technology-26447317"><img src="img/press-bbc.png" width="175" height="50"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;A quick way to check a whole website.&rdquo;
						<br/>
						<a href="http://www.bbc.com/news/technology-26447317">BBC News</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.nbcnews.com/id/32657885/ns/technology_and_science-tech_and_gadgets/t/steal-story-beware-nets-plagiarism-cops/#.V5DySJO7iko"><img src="img/press-nbc.png" width="300" height="49"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Talk about an eye opening experience...&rdquo;
						<br/>
						<a href="http://www.nbcnews.com/id/32657885/ns/technology_and_science-tech_and_gadgets/t/steal-story-beware-nets-plagiarism-cops/#.V5DySJO7iko">NBC News</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.forbes.com/sites/jaysondemers/2016/06/07/7-seo-mistakes-even-seo-professionals-make/#c2e64819d073"><img src="img/press-forbes-new.png" width="180" height="51"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Identify duplicate content issues on your site.&rdquo;
						<br/>
						<a href="http://www.forbes.com/sites/jaysondemers/2016/06/07/7-seo-mistakes-even-seo-professionals-make/#c2e64819d073">Forbes</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.boston.com/business/articles/2006/05/08/online_plagiarism_strikes_blog_world/"><img src="img/press-boston-globe-new.png" width="300" height="47"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Copyscape can help find word-for-word copies of content on the Web.&rdquo;
						<br/>
						<a href="http://www.boston.com/business/articles/2006/05/08/online_plagiarism_strikes_blog_world/">The Boston Globe</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.bloomberg.com/news/articles/2008-03-03/scanning-for-scammers-before-you-buy-inbusinessweek-business-news-stock-market-and-financial-advice"><img src="img/press-businessweek.png" width="220" height="47"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;One of our favorite tools...&rdquo;
						<br/>
						<a href="http://www.bloomberg.com/news/articles/2008-03-03/scanning-for-scammers-before-you-buy-inbusinessweek-business-news-stock-market-and-financial-advice">BusinessWeek, now Bloomberg</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.huffingtonpost.com/catriona-pollard/how-to-deal-with-copycats_b_10799118.html"><img src="img/press-huffpost-new.png" width="300" height="24"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Use Copyscape to check for online plagiarism before you publish.&rdquo;
						<br/>
						<a href="http://www.huffingtonpost.com/catriona-pollard/how-to-deal-with-copycats_b_10799118.html">The Huffington Post</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.guardian.co.uk/media/pda/2009/may/09/media-events-conferences-digital-media"><img src="img/press-guardian.png" width="175" height="38"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Vigorously protecting their copyright... spotted 100 online infringements of their 
content in the last year.&rdquo;
						<br/>
						<a href="http://www.guardian.co.uk/media/pda/2009/may/09/media-events-conferences-digital-media">The Guardian</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.smh.com.au/digital-life/digital-life-news/seo-get-on-top-of-google-and-stay-there-20130813-2rv1t.html"><img src="img/press-smh.png" width="300" height="31"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;ldquo;A useful tool for detecting duplicated material... Worth the investment.&rdquo;
						<br/>
						<a href="http://www.smh.com.au/digital-life/digital-life-news/seo-get-on-top-of-google-and-stay-there-20130813-2rv1t.html">The Sydney Morning Herald</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.philly.com/"><img src="img/press-phila-new.png" width="300" height="32"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Clever and effective... the best tool out there for controlling how your content is used.&rdquo;
						<br/>
						<a href="http://www.philly.com/">The Philadelphia Inquirer</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.independent.co.uk/news/science/web-design-is-a-real-steal-527680.html"><img src="img/press-independent-new.png" width="300" height="74"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;If you want to put your mind at rest... check that your site hasn't been lifted with the Copyscape utility.&rdquo;
						<br/>
						<a href="http://www.independent.co.uk/news/science/web-design-is-a-real-steal-527680.html">The Independent</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.usatoday.com/tech/products/cnet/2007-08-02-blog-plagiarism_N.htm"><img src="img/press-usa-today-new.png" width="300" height="42"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Tracking copyrighted content online.&rdquo;
						<br/>
						<a href="http://www.usatoday.com/tech/products/cnet/2007-08-02-blog-plagiarism_N.htm">USA Today</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://news.cnet.com/8301-13530_3-9916833-28.html"><img src="img/press-cnet-new.png" width="70" height="69"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Keep on top of potential content theft issues.&rdquo;
						<br/>
						<a href="http://news.cnet.com/8301-13530_3-9916833-28.html">CNET</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.pcmag.com/article2/0,1895,1871384,00.asp"><img src="img/press-pcmag-new2.png" height="70" width="70"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Now there's a simple way to find plagiarists online, so you can protect what's yours.&rdquo;
						<br/>
						<a href="http://www.pcmag.com/article2/0,1895,1871384,00.asp">PC Magazine Top 101 Websites</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.plagiarismtoday.com/2008/11/04/copyscape-tops-plagiarism-checker-testing/"><img src="img/press-plagiarism-today.png" width="175" height="37"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Copyscape Tops Plagiarism Checker Testing... Copyscape Premium takes the top spot.&rdquo;
						<br/>
						<a href="http://www.plagiarismtoday.com/2008/11/04/copyscape-tops-plagiarism-checker-testing/">Plagiarism Today</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.lawpracticetoday.org/article/seo-trends/"><img src="img/press-aba-new2.png" width="140" height="68"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Check the originality of your content... We recommend purchasing the Copyscape paid service.&rdquo;
						<br/>
						<a href="http://www.lawpracticetoday.org/article/seo-trends/">American Bar Association</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.zdnet.com/article/copyscape/"><img src="img/press-zdnet-new.png" width="110" height="70"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;Try it on your own website. Very cool.&rdquo;
						<br/>
						<a href="http://www.zdnet.com/article/copyscape/">ZDNet</a>
					</p>
				</div>
			</div>
			
	
			
			<div class="two_columns">
				<div class="grid_6">
					<div class="press_img">
						<a href="http://www.hostingadvice.com/blog/why-you-need-copyscape/"><img src="img/hostingadvice-logo.png" width="220"></a>
					</div>
				</div>
				<div class="grid_6">
					<p class="press_text">
						&ldquo;The team members at Copyscape are anti-plagiarism war veterans.&rdquo;
						<br/>
						<a href="http://www.hostingadvice.com/blog/why-you-need-copyscape/">HostingAdvice.com</a>
					</p>
				</div>
			</div>
			
		
			
			<div class="clear"></div>
			
			<div id="footer">
				<p>
					Copyscape &copy; 2019 Indigo Stream Technologies, providers of <a href="http://www.gigaalert.com/">Giga Alert</a>
					and <a href="http://www.siteliner.com/">Siteliner</a>.
					All rights reserved.
					<a href="terms.php">Terms of Use.</a>
				</p>
			</div>
			
		</div>
	</body>
</html>
