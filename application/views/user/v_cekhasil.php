<?php
//cetak isi field suhu
if ($data_sensor != "-") {
    echo $data_sensor->hasil;
} else {
    echo '<p class="text-secondary text-center">-</p>';
}
