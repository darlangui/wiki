<?php
    session_start();
    unset($_SESSION['status']);
    session_abort();