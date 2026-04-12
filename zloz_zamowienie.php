<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ykom_baza");

// 1. zapis danych użytkownika
$query = "INSERT INTO dane_uzyt_zam (imie, nazwisko, ulica, nr_dom, miejscowosc, kod_poczt, nr_tel, email)
VALUES (
    '{$_POST['imie']}',
    '{$_POST['nazwisko']}',
    '{$_POST['ulica']}',
    '{$_POST['nr_dom']}',
    '{$_POST['miasto']}',
    '{$_POST['kod']}',
    '{$_POST['tel']}',
    '{$_POST['email']}'
)";
mysqli_query($conn, $query);

$id_osoby = mysqli_insert_id($conn);