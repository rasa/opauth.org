<?php require('includes/head.php'); ?>
<p class="center">
	<img src="images/opauth-diagram.png" alt="Opauth diagram">
</p>

<div class="highlight">
	<p>Opauth enables PHP applications to do <em>user authentication</em> with ease.</p>

	<p class="buttons">
	<a href="#demo" class="button primary">Demo</a>
	<a href="download.php" class="button primary">Download</a>
	<a href="https://github.com/opauth/opauth/wiki" class="button" target="_blank">Documentations</a>
	</p>		
</div>

<h2>What is Opauth?</h2>

<p>Inspired by <a href="https://github.com/intridea/omniauth">OmniAuth for Ruby</a>, Opauth provides a standardized method for PHP applications to interface with authentication providers. </p>

<p>Opauth as a framework provides a set of API that allows developers to <a href="https://github.com/opauth/opauth/wiki/Strategy-Contribution-Guide">create strategies</a> that work in a predictable manner across PHP frameworks and applications.</p>

<p>Opauth works well with other PHP applications &amp; frameworks. It is currently supported on:
	<ul>
		<li><a href="https://github.com/opauth/opauth/tree/master/example">vanilla (plain) PHP applications</a> <small><em>(of course)</em></small></li>
		<li><a href="https://github.com/uzyn/cakephp-opauth">CakePHP</a> <small><em>(maintained by <a href="https://github.com/uzyn">uzyn</a>)</em></small></li>
		<li><a href="https://github.com/destinomultimedia/ci_opauth">CodeIgniter</a> <small><em>(maintained by <a href="https://github.com/destinomultimedia">destinomultimedia</a>)</em></small></li>
		<li><a href="https://github.com/mcatm/Opauth-Plugin-for-Codeigniter">CodeIgniter</a> <small><em>(maintained by <a href="https://github.com/mcatm">mcatm</a>)</em></small></li>
		<li><a href="https://github.com/andreoav/fuel-opauth">FuelPHP</a> <small><em>(maintained by <a href="https://github.com/andreoav/">andreoav</a>)</em></small></li>
		<li><a href="https://github.com/FakeHeal/opauth-laravel">Laravel</a> <small><em>(maintained by <a href="https://github.com/FakeHeal/">FakeHeal</a>)</em></small></li>
		<li><a href="https://github.com/Onasusweb/PrestaShop-Opauth">PrestaShop</a> <small><em>(maintained by <a href="https://github.com/Onasusweb/">Onasusweb</a>)</em></small></li>
		<li><a href="https://github.com/icehero/silex-opauth">Silex</a> <small><em>(maintained by <a href="https://github.com/icehero/">icehero</a>)</em></small></li>
		<li><a href="https://github.com/kahwee/yii-opauth">Yii Framework</a> <small><em>(maintained by <a href="https://github.com/kahwee">kahwee</a>)</em></small></li>
		<li><a href="https://github.com/lorenzoferrarajr/LfjOpauth">Zend Framework 2</a> <small><em>(maintained by <a href="https://github.com/lorenzoferrarajr">lorenzoferrarajr</a>)</em></small></li>
		<li><a href="https://github.com/michalsvec/nette-opauth">Nette</a> <small><em>(maintained by <a href="https://github.com/michalsvec">michalsvec</a>)</em></small></li>
	<li>and more to come.</li>
	</ul>
</p>
<p>If your PHP framework of choice is not yet listed, you can still use Opauth like you would a normal PHP component (class).</p>

<p><script async class="speakerdeck-embed" data-id="4fbb28ec15a68f001f012325" data-ratio="1.4143646408839778" src="//speakerdeck.com/assets/embed.js"></script></p>

<h2><a name="strategies"></a><a name="demo"></a>Available strategies</h2>
<?php require('includes/strategies.php'); ?>


<h2>Issues &amp; questions</h2>

<ul>
<li>Discussion group: <a href="https://groups.google.com/group/opauth">Google Groups</a><br>Feel free to post any questions to the discussion group.<br>
</li>
<li>Issues: <a href="https://github.com/opauth/opauth/issues">Github Issues</a><br>
</li>
<li>Twitter: <a href="http://twitter.com/uzyn">@uzyn</a><br>
</li>
<li>Email me: <a href="mailto:chua@uzyn.com">chua@uzyn.com</a><br>
</li>
<li>IRC: <strong>#opauth</strong> on <a href="http://webchat.freenode.net/?channels=opauth&amp;uio=d4">Freenode</a>
</li>
</ul>

<p>Used Opauth in your project? Tell us! We'll provide a link to your site.</p>

<?php require('includes/foot.php'); ?>