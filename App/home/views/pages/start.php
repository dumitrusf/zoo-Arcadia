
<?php 

session_start();

?>

<div class="jumbotron">
    <h1 class="display-4">Welcome <?php echo $_SESSION["user"]["username"]; ?> !, to your dashboard.</h1>
    <p class="blockquote">From here you can access all the management sections of the zoo.</p>
    <p class="lead">Depending on your Role or/and permissions, you will have access to different sections.</p>
    <hr class="my-4">
    <p>(i really don't know what to write 😂😂 my ideas are all gone) Soon, here you will see summaries and direct access based on your permissions.</p>
</div>

