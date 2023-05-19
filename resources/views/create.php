<?php
include "koneksidb.php";

if(isset($_POST['submit'])) {
  // Ambil data dari form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  // Upload file avatar
  $target_dir = "uploads/";
  $avatar = $_FILES['avatar']['name'];
  $target_file = $target_dir . basename($avatar);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Memeriksa apakah file yang diunggah oleh pengguna adalah file gambar atau bukan.
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }

  // Periksa ukuran avatar
  if ($_FILES["avatar"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Membatasi ekstensi file avatar
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Memeriksa jika variabel $uploadOk merupakan 0 karna sebuah eror atau tidak
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // Pengunggahan avatar
  } else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
      // Simpan data ke dalam tabel users
      $sql = "INSERT INTO users (name, email, role, phone, address, password, avatar)
      VALUES ('$name', '$email', '$role', '$phone', '$address', '$password', '$avatar')";
      if (mysqli_query($conn, $sql)) {
		header("Location: readuser.php"); // redirect ke halaman readuser.php
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data pengguna</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<style>
		.form-group {
			margin-bottom: 1rem;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1 class="text-center my-5">Tambah Pengguna</h1>

		<form action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label for="name">Nama</label>
				<input type="text" class="form-control" name="name" required>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" required>
			</div>

			<div class="form-group">
				<label for="phone">Nomor Telepon</label>
				<input type="text" class="form-control" name="phone" required>
			</div>

			<div class="form-group">
				<label for="role">Role</label>
				<select class="form-control" name="role" required>
					<option value="">Pilih Role</option>
					<option value="admin">Admin</option>
					<option value="staff">Staff</option>
				</select>
			</div>

			<div class="form-group">
				<label for="address">Alamat</label>
				<textarea class="form-control" name="address"></textarea>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" id="password" required>
					<button class="btn btn-outline-secondary" type="button" id="showPasswordBtn"><i class="fas fa-eye"></i></button>
				</div>
			</div>

			<div class="form-group">
				<label for="avatar">Avatar</label>
				<input type="file" class="form-control" name="avatar" accept="image/*">
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
			<a href="readuser.php" class="btn btn-danger">Batal</a>

		</form>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
	<script>
		const showPasswordBtn = document.querySelector('#showPasswordBtn');
		const passwordInput = document.querySelector('#password');
		showPasswordBtn.addEventListener('click', () => {
			if(passwordInput.type === 'password'){
				passwordInput.type = 'text';
				showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
			} else {
				passwordInput.type = 'password';
				showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
			}
		})
	</script>
</body>
</html>
