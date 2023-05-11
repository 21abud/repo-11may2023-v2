<?php
$file= "mydata.json";
$ambilData= file_get_contents($file);
$decodeData= json_decode($ambilData, TRUE);
?>

<?php foreach($decodeData as $data): ?>
<tr>
        <td><?= $data['nama']; ?></td>
        <td><?= $data['kelamin']; ?></td>
        <td><?= $data['email']; ?></td>
        <td><?= $data['alamat']; ?></td>
        <td><?= $data['program']; ?></td>
        <td><?= $data['tahun']; ?></td>
</tr>
<?php endforeach; ?>
