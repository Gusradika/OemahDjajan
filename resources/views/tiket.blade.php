<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Oswald&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Oswald", sans-serif;
            text-transform: uppercase;

            --black: rgba(2, 2, 2, 0.8);
            --beige: #f8f8f8;
            --mustard: #c4c4c4;
            --border: 4px solid var(--black);
            --bkg: rgb(10, 10, 10);

            color: var(--black);
            background-color: var(--bkg);
        }

        ul {
            list-style: none;
        }

        .alfa {
            font-family: "Alfa Slab One", sans-serif;
        }

        .ticket {
            width: 220px;
            position: relative;
            cursor: pointer;
        }

        .ticket:hover .ticket-stub {
            top: -40px;
        }

        /* TICKET STUB
------------------------------------------------- */
        .ticket-stub-gap {
            position: absolute;
            top: -1px;
            left: 50%;
            z-index: 1;
            transform: translateX(-50%);
            width: 102px;
            height: 102px;
            border-radius: 50%;
            background-color: var(--bkg);
        }

        .ticket-stub {
            position: absolute;
            top: 0;
            left: 50%;
            z-index: 2;
            transform: translate(-50%, 0);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: grid;
            justify-items: center;
            align-content: center;
            grid-template-rows: 15px 30px 20px;
            font-family: "Alfa Slab One", sans-serif;
            background-color: var(--mustard);
            /* background-image: url("https://www.transparenttextures.com/patterns/cardboard.png"); */
            border: var(--border);
            transition: top 0.3s ease-in-out;
        }

        .ticket-stub h3 {
            font-size: 16px;
        }

        .ticket-stub h1 {
            font-size: 26px;
        }

        .ticket-stub .barcode svg {
            width: 52px;
            height: 15px;
            fill: var(--black);
        }

        /* TICKET BODY
------------------------------------------------- */
        .ticket-body {
            width: 100%;
            grid-template-columns: 1fr 1fr;
            grid-auto-rows: min-content;
            background-color: var(--beige);
            /* background-image: url("https://www.transparenttextures.com/patterns/cardboard.png"); */
            padding: 0 18px;
            transform: translateY(50px);
            overflow: hidden;
            border: var(--border);
        }

        /* Utensils */
        .ticket-body__utensils {
            display: grid;
            place-items: center;
            transform: translateY(-20px);
        }

        .ticket-body__utensils svg {
            width: 164px;
            height: 100px;
            fill: var(--black);
        }

        /* Title */
        .ticket-body__title {
            margin-bottom: 30px;
            text-align: center;
        }

        .ticket-body__title h1 {
            font-size: 5em;
            line-height: 1em;
        }

        .ticket-body__title h2 {
            font-size: 3.7em;
            line-height: 0.9em;
            font-weight: normal;
        }

        .ticket-body__title h3 {
            font-size: 1.4em;
            line-height: 1em;
            letter-spacing: 1px;
            text-align: center;
            padding: 5px;
            margin-top: 10px;
            background-color: var(--black);
            color: var(--beige);
        }

        /* Events */
        .ticket-body__events {
            border-top: var(--border);
            border-bottom: var(--border);
            padding: 10px 1px;
            margin-bottom: 30px;
        }

        .ticket-body__events ul {
            text-align: center;
        }

        .ticket-body__events li {
            display: inline;
            font-size: 0.8em;
        }

        .ticket-body__events li::after {
            content: " / ";
        }

        .ticket-body__events li:last-child::after {
            content: "";
        }

        /* Date/Location */

        /* DATE */
        .ticket-body__date {
            margin: 10px 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }

        .box-date {
            display: grid;
            grid-template-rows: repeat(3, 25px);
        }

        .box-date>* {
            align-self: stretch;
            text-align: center;
        }

        .box-date h3 {
            font-weight: normal;
        }

        .box-date h2:last-child {
            font-size: 1.8em;
        }

        /* VENUE */
        .box-venue {
            padding: 3px;
            background-color: var(--mustard);
            background-image: url("https://www.transparenttextures.com/patterns/cardboard.png");
            text-align: center;
            display: grid;
            grid-template-rows: repeat(3, 25px);
        }

        .box-venue>* {
            align-self: stretch;
            text-align: center;
        }

        .box-venue h3 {
            font-weight: normal;
        }

        .box-venue h3:first-child {
            letter-spacing: 0.08em;
        }

        /* Footer */
        .ticket-body__footer {
            margin: 30px 0;
        }

        .ticket-body__footer .barcode svg {
            fill: var(--black);
        }

        /* Help Text */
        .help {
            position: fixed;
            top: 3%;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
    <div class="help" style="color:white; text-align: center;">Mohon Tunjukan tiket kepada kasir untuk Proses
        berikutnya</div>

    <div class="ticket">
        <div class="ticket-stub-gap"></div>
        <div class="ticket-stub">
            <h3></h3>
            <h1></h1>
            <div class="barcode">

            </div>
        </div>
        <div class="ticket-body">
            <div class="ticket-body__utensils">
                <svg viewBox="0 0 164 100">
                    <path
                        d="M146.398 50.277h6.27V5.52c0-1.497.546-2.792 1.639-3.885C155.383.56 156.656.017 158.122 0c1.464.017 2.738.559 3.814 1.634 1.093 1.093 1.64 2.388 1.64 3.885v91.719c0 .746-.274 1.394-.82 1.942-.547.546-1.194.82-1.941.82h-1.985c-3.8 0-7.05-1.353-9.755-4.057-2.704-2.706-4.057-5.957-4.057-9.755v-34.53c0-.374.137-.698.41-.971.272-.273.596-.41.97-.41zM9.238 65.148V5.713c0-1.55.565-2.89 1.698-4.021C12.05.578 13.366.018 14.884 0c1.517.017 2.835.577 3.949 1.69 1.132 1.132 1.697 2.473 1.697 4.022v59.435c1.698.595 8.064 6.269 8.064 8.088v23.905c0 .773-.284 1.444-.849 2.01-.566.565-1.237.85-2.01.85-.775 0-1.445-.285-2.01-.85-.567-.567-.85-1.237-.85-2.01V78.554c0-.776-.283-1.445-.849-2.01-.566-.567-1.236-.849-2.01-.849-.775 0-1.445.282-2.01.848-.566.566-.85 1.237-.85 2.01v18.588c0 .773-.283 1.444-.849 2.01-.565.565-1.236.85-2.01.85-.775 0-1.445-.285-2.01-.85-.567-.567-.85-1.237-.85-2.01V78.554c0-.776-.283-1.445-.849-2.01-.566-.567-1.236-.849-2.01-.849-.775 0-1.445.282-2.01.848-.567.566-.85 1.237-.85 2.01v18.588c0 .773-.282 1.444-.848 2.01-.566.565-1.237.85-2.01.85-.776 0-1.446-.285-2.01-.85-.566-.567-.85-1.237-.85-2.01V73.237c0-1.819 7.54-7.493 9.238-8.089z"
                        fill-rule="nonzero" />
                </svg>
            </div>
            <div class="ticket-body__title">
                <h1 class="" style="font-size: 40px;">Oemah</h1>
                <h2>Djajan</h2>
                <h3>Order ID : {{ $orderid }}</h3>
                <p>Date : {{ $date }}</p>
            </div>
            <div class="ticket-body__events">
                <ul>
                    <li>Also follow our : Social Media</li>
                </ul>
            </div>
            <div>
                <div class="box-date">
                    <h2 class="" style="font-size:16px;">Total yang harus dibayar</h2>
                    <h3>Mr/Mrs. {{ $namaPemesan }}</h3>
                    <h2 class="">Rp. {{ $grandTotal }}</h2>
                </div>
            </div>
            <div class="ticket-body__footer">
                <div class="barcode">
                    <svg viewBox="0 0 130 30">
                        <path
                            d="M1.5 0H0v30h1.5V0zm118.587 0h-1v30h1V0zm-31 0h-1v30h1V0zm-56 0h-1v30h1V0zm3.5 0h-1.5v30h1.5V0zm87 0h-1.5v30h1.5V0zm-25 0h-1.5v30h1.5V0zm4 0h-1.5v30h1.5V0zM5 0H3v30h2V0zm70 0h-2v30h2V0zm20 0h-2v30h2V0zm20 0h-2v30h2V0zM62 0h-2v30h2V0zM41.568 0h-2v30h2V0zM9.667 0H7v30h2.667V0zm21.385 0h-3.26v30h3.26V0zM67.03 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zM15.889 0h-3.556v30h3.556V0zm41 0h-3.556v30h3.556V0zM25.283 0h-6.321v30h6.32V0zm57.52 0h-6.32v30h6.32V0zM51.613 0h-8.428v30h8.428V0zm78.192 0h-4.436v30h4.436V0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <a href="/">Back</a>
</body>

</html>
