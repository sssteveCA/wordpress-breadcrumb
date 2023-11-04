<div>
A simple plugin for Wordpress that displays a breadcrumb in every page improving the user navigation on the site
</div>
<br><br>
<div>
    You need <a href="https://nodejs.org/en/download">NodeJs</a> and <a href="https://nodejs.org/en/download">Composer</a> to compile your sources.<br><br>
</div>
<div>
    Next run from your terminal:<br>
    <ul>
        <li><b>npm i</b></li>
        <li><b>composer install</b></li>
        <li><b>npm run dev</b></li>
    </ul>
    
</div>
<div>
    <br><br>
    If you want use this plugin in production:<br>
    <ul>
       <li><b>npm i --omit=dev</b></li>
       <li><b>composer install --optmize=autoloader --no-dev</b></li>
       <li><b>npm run build</b></li>
       <li>Create the .zip archive with this command: <b>zip -r classes dist interfaces node_modules scripts traits breadcrumb.php</b></li>
       <li>Install the plugin uploading the created zip file</li>
    </ul>
</div>
<br><br>
<a href="https://user-images.githubusercontent.com/95185311/222216662-f97dd023-82f0-4a02-8303-4efb701a1eb4.jpg">An example of the outputted breadcrumb</a>
</div>
