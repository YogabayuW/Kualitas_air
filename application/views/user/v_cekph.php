<?php
//cetak isi field suhu
if ($data_sensor != "-") {
    echo '<p class="text-black">' . $data_sensor->ph . ' pH</p>';
} else {
    echo '<p class="text-secondary text-center">-</p>';
}
