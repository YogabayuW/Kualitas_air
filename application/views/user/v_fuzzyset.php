<?php
//cetak isi field suhu
if ($data_sensor != "-") {
    echo $data_sensor->fuzzy_set;
} else {
    echo '<p class="text-secondary text-center">-</p>';
}
