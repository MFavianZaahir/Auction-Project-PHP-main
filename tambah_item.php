<?php
include "header.php";
?>
<div class="container" id="tambah-item-form" style="padding-top: 6rem;">
    <div class="text-center">
        <h3>ADD ITEMS</h3>
        <div id="response" class="mb-3"></div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form action="tambah_item_proses.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="startprice" class="form-label">Harga Awal:</label>
                    <input type="number" id="startprice" name="startprice" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="foto" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-primary w-25" style="margin-left: 40%" value="Upload Item" name="submit">
            </form>
        </div>
    </div>
</div>

<!-- 
<script>
    function submitForm() {
        var form = document.getElementById("myForm");
        var name = form.elements.name.value;
        var startprice = form.elements.startprice.value;
        var deskripsi = form.elements.deskripsi.value;
        var responseContainer = document.getElementById("response");
        if (!name || !startprice || !deskripsi) {
            responseContainer.innerHTML = '<div class="alert alert-danger">' + "all fields are required!" + '</div>';
            return;
        }
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "tambah_item_proses.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    responseContainer.innerHTML = '<div class="alert alert-success">' + response.message + '</div>';
                    form.reset();
                } else {
                    responseContainer.innerHTML = '<div class="alert alert-danger">' + response.message + '</div>';
                }
                responseContainer.style.display = "block";
            }
        };

        xhr.send(formData);
    }
</script> -->
</body>

</html>