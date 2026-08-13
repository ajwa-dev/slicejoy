
<!--header-->   

<?php include 'partials/header.php'; ?>       




<?php

include 'partials/configure.php';

if(isset($_POST['add_services']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $target_page = $_POST['target_page'];
    $btn_text = $_POST['btn_text'];
    $emoji = $_POST['emoji'];
    $card_style = $_POST['card_style'];

    $query = "INSERT INTO add_services
    (name, description, target_page, btn_text, emoji, card_style)

    VALUES

    ('$name', '$description', '$target_page', '$btn_text', '$emoji', '$card_style')";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo "<script>alert('Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed To Add');</script>";
    }
}

?>










         

<!--body-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <h1 class="mt-4 fw-bold text-dark">Services Dashboard</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="services.php">Services</a>
                </li>

                <li class="breadcrumb-item active">
                    Add New Category
                </li>
            </ol>

            <div class="card mb-4 shadow border-0">

                <div class="card-header bg-dark text-white py-3">
                    <i class="fas fa-plus-circle me-1"></i>
                    <strong>Add New Service Category to Dashboard</strong>
                </div>

                <div class="card-body p-4 p-lg-5">

                    <form action="" method="POST">

                        <div class="row g-4">

                            <div class="col-lg-8">

                                <div class="mb-4">
                                    <label class="form-label fw-bold">
                                        Service Category Name
                                    </label>

                                    <input 
                                        type="text"
                                        class="form-control form-control-lg"
                                        name="name"
                                        placeholder="e.g. Flower Decor"
                                        required
                                    >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">
                                        Description
                                    </label>

                                    <textarea
                                        class="form-control"
                                        name="description"
                                        rows="4"
                                        required
                                    ></textarea>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-bold">
                                            Target Page URL
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            name="target_page"
                                            placeholder="customize-cakes.php"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-bold">
                                            Button Text
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            name="btn_text"
                                            placeholder="Explore"
                                            required
                                        >
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="border rounded p-4 text-center bg-light h-100">

                                    <div class="mb-4">

                                        <label class="form-label fw-bold d-block">
                                            Category Emoji
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control text-center fs-2 fw-bold"
                                            name="emoji"
                                            placeholder="✨"
                                            maxlength="2"
                                            style="max-width:100px; margin:auto;"
                                            required
                                        >

                                    </div>

                                    <div class="mb-3 text-start">

                                        <label class="form-label fw-bold">
                                            Card Theme
                                        </label>

                                        <select
                                            class="form-select"
                                            name="card_style"
                                            required
                                        >
                                            <option value="bg-grad-pink">
                                                Soft Pink
                                            </option>

                                            <option value="bg-grad-purple">
                                                Royal Purple
                                            </option>

                                            <option value="bg-grad-green">
                                                Fresh Green
                                            </option>

                                            <option value="bg-grad-dark">
                                                Elegant Dark
                                            </option>
                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <hr class="my-4">

                        <div class="text-end">

                            <button
                                type="reset"
                                class="btn btn-outline-secondary px-4 me-2"
                            >
                                Clear Form
                            </button>

                            <button
                                type="submit"
                                name="add_category"
                                class="btn btn-primary px-5"
                            >
                                Add Category Card
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </main>

<!--footer-->

<?php include 'partials/footer.php'; ?>