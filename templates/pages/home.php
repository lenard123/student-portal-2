<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= asset('img/logo.png') ?>" type="image/x-icon">
    <title>Home</title>
    <link rel="stylesheet" href="<?= asset('main.css') ?>">
</head>
<body>
    <?= view()->components('navbar')->render() ?>

    <div class="bg-[#CFEBEB] py-24">
        <h1 style="text-shadow: 1px 1px 2px black;" class="text-5xl text-white font-inter font-black text-center">The Lord's Wisdom Academy of Caloocan Inc.</h1>
        <img class="mt-8 mx-auto rounded hover:scale-110 hover:shadow transition" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.6435-9/192871821_3811248295664283_7149557183651194795_n.png?_nc_cat=111&ccb=1-7&_nc_sid=dd9801&efg=eyJpIjoidCJ9&_nc_eui2=AeGEZVPt3vyEeetYdPyvI7QAYb5wTymGN4NhvnBPKYY3g6dvvYDuzBfdtSC2ouwdZgT_lsXnPPVM3a-l3ybeDzfx&_nc_ohc=BB5ejkuycPoAX8Nlacs&_nc_ht=scontent-sin6-1.xx&oh=00_AT-rs6oJuojULmcoJ5MoUHRjfnGFaMdIOa8yYSSyeTP6HA&oe=62F08163"/>
    </div>

</body>
</html>