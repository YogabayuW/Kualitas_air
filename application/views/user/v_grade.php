<?php
//cetak isi field suhu
if ($data_sensor != "-") {
    if ($data_sensor->grade == "GRADE-A") {
        echo '<p class="text-success">' . $data_sensor->grade . '</p>';
    } else if ($data_sensor->grade == "GRADE-B") {
        echo '<p class="text-warning">' . $data_sensor->grade . '</p>';
    } else if ($data_sensor->grade == "GRADE-C") {
        echo '<p class="text-danger">' . $data_sensor->grade . '</p>';
    } else {
        echo 'Terdapat Kesalahan';
    }
} else {
    echo '<p class="text-secondary text-center">Belum Terdapat Data</p>';
}
