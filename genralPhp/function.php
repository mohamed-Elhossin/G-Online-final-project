<?php

function testMessage($condation, $mess)
{
    if ($condation) {
        echo "<div class='alert alert-info col-6 m-auto'>
       <h2 class='text-center'>  $mess IS Done </h2>
        </div>";
    } else {
        echo "<div class='alert alert-danger col-6 m-auto'>
        <h2 class='text-center'>  $mess IS False </h2>
         </div>";
    }
}
