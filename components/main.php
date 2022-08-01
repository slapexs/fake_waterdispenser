<?php
$pd_types = [
    [
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/2872/2872397.png",
            "name" => "เครื่องดื่มขายดี",
            "type" => "recommend"
        ],
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/590/590749.png",
            "name" => "กาแฟ",
            "type" => "coffee"
        ]
    ],
    [
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/5303/5303997.png",
            "name" => "ชา",
            "type" => "tea"
        ],
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/3081/3081162.png",
            "name" => "นม โกโก้ และคาราเมล",
            "type" => "smoothie"
        ]
    ],
    [
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/2405/2405479.png",
            "name" => "น้ำอัดลม โซดา",
            "type" => "soda"
        ],
        [
            "img" => "https://cdn-icons-png.flaticon.com/512/2405/2405470.png",
            "name" => "อื่น ๆ",
            "type" => "other"
        ]
    ]
];
?>

<h1 class="text-center display-4 mb-5">กรุณาเลือกประเภทสินค้า</h1>
<section class="row mx-auto">
    <?php for ($i = 0; $i < 3; $i++) { ?>
        <div class="col-md-6 text-center my-3">
            <div class="p-4 border rounded border-2" id="<?= $pd_types[$i][0]["type"]; ?>">
                <img src="<?= $pd_types[$i][0]["img"]; ?>" class="img-fluid mb-2" width="64" alt="เครื่องดื่มขายดี">
                <h3><?= $pd_types[$i][0]["name"]; ?></h3>
            </div>
        </div>

        <div class="col-md-6 text-center my-3">
            <div class="p-4 border rounded border-2" id="<?= $pd_types[$i][1]["type"]; ?>">
                <img src="<?= $pd_types[$i][1]["img"]; ?>" class="img-fluid mb-2" width="64" alt="เครื่องดื่มขายดี">
                <h3><?= $pd_types[$i][1]["name"]; ?></h3>
            </div>
        </div>
    <?php } ?>
</section>