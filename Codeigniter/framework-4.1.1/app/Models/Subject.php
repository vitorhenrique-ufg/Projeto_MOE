<?php
namespace App\Models\Subject;

interface Subject{
    public function addObserver();
    public function removeObserver();
    public function enviarEmail();
}
?>
