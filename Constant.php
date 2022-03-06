<?php 
// Regex -> Start 
    // Email
    define('REGEX_VALIDATED_EMAIL', "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i");

    // Vnexpress
        // Date
        define('REGEX_VNEXPRESS_DATE', '#<span class="date">(.*?)</span>#si');
        // Title
        define('REGEX_VNEXPRESS_TITLE', '#<h1 class="title-detail">(.*?)</h1>#si');
        // Date
        define('REGEX_VNEXPRESS_DESCRIPTION', '#<p class="description">(.*?)</p>#si');
        // Title
        define('REGEX_VNEXPRESS_DETAILS', '#<p class="Normal">(.*?)</p>#si');

    // Dantri
        // Date
        define('REGEX_DANTRI_DATE', '#<time class="author-time" .+?>(.*?)</time>#si');
        // Title
        define('REGEX_DANTRI_TITLE', '#<h1 class="title-page detail">(.*?)</h1>#si');
        // Date
        define('REGEX_DANTRI_DESCRIPTION', '#<h2 class="singular-sapo">(.*?)</h2>#si');
        // Title
        define('REGEX_DANTRI_DETAILS', '#<p>(.*?)</p>#si');

    // Vietnamnet
        // Date
        define('REGEX_VIETNAMNET_DATE', '#<span class="ArticleDate">(.*?)</span>#si');
        // Title
        define('REGEX_VIETNAMNET_TITLE', '#<h1 class="title .+?">(.*?)</h1>#si');
        // Date
        define('REGEX_VIETNAMNET_DESCRIPTION', '#<div class="bold ArticleLead"><p>(.*?)</p></div>#si');
        // Title
        define('REGEX_VIETNAMNET_DETAILS', '#<p class="t-j">(.*?)</p>#si');

// Regex -> End