## Simply assets

Simply Assets is a final tas for Codeles.io courses where I have created Mockup site for crypto asset trading.
Uses Messari crypto asset API and Newsapi.org Api to get latest information about crypto assets and news.

<p>Technologies used</p>
<ul>
    <li>PHP 8.1</li>
    <li>MySql 8</li>
    <li>Laravel v9.19</li>
    <li>TailwindCSS v3.1</li>
</ul>

## Instructions To Set Up Projects with Laravel

<h3>Firs time setup</h3>

<p>Clone or download repository</p>
<p>Open terminal or command line in that directory</p>
<p>Copy and rename <code>.env.example</code> file to <code>.env</code><br>
In <code>.env</code> file configure connection to database and your API's to these fields</p>
<pre>
    MESSARI_API_KEY="Your Messari API key here"
    NEWS_API_KEY="Your Newsapi.org Api key here"
</pre>

<p>Run these commands to create and start the project</p>
<p>Run them one by one</p>
<pre>
    php artisan key:generate
    php artisan migrate
    php artisan cryptoAsset:store {count}
    npm install && npm run dev
</pre>

<p>In new terminal run</p>
<pre>
    php artisan schedule:work
</pre>
<p>In new terminal run</p>
<pre>
    php artisan serve
</pre>

<p>After first time Setup</p>
<p>In new terminal run</p>
<pre>
    php artisan schedule:work
</pre>
<p>In new terminal run</p>
<pre>
    php artisan serve
</pre>
