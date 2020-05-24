<?php

class Marca
{
    public function NumarPeAn($marca, $an)
    {
        require '../db-init.php';
        $an = 'An'.$an;
        $sql = "SELECT * FROM " . $an ." WHERE lower(p.theme) LIKE ('%".$theme."%')";
        $rezultat = $conn->prepare($sql);
        $rezultat->execute();
        $numere = $rezultat->get_result();
        $nrMasini = [];
        while($numar = mysqli_fetch_array($numere)) {
            $nrMasini[]=$numar;
        }
        $rezultat->close();
        return $nrMasini;
    }
}