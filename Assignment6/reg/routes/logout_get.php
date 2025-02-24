<?php

logout();

unset($_SESSION['student_id']);
unset($_SESSION['timestamp']);

renderView('home_get');