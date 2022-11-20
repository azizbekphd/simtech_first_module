<?php

if (!isset($navbar_links)) {
    $navbar_links = [
        [
            "title" => "Sent feedbacks",
            "href" => "/sent_feedbacks.php",
        ],
        [
            "title" => "Contact us",
            "href" => "/contact_us.php",
        ],
    ];
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="/">Cool site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
        foreach ( $navbar_links as $link ) {
            $title = $link["title"];
            $active = strtok($_SERVER["REQUEST_URI"], '?') == $link["href"];
            $href = $active ? "#" : $link["href"];
        ?>
        <li class="nav-item<?php if ($active) echo " active"; ?>">
            <a class="nav-link" href="<?php echo $href; ?>"><?php echo $title; ?></a>
        </li>
      <?php
        }
      ?>
    </ul>
  </div>
</nav>

