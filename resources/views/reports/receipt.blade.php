<div id="invoice-POS">
    <!-- Print section -->
    <div id="printed_content">

        <center id="logo">
            <div class="logo">ร้านค้า Pos</div>
            <div class="info"></div>
            <h2>POS Ltd</h2>
        </center>
        <div class="mid">
            <div class="info">
                <h2>การติดต่อ</h2>
                <p>
                    ที่อยู่ 99 หมู่ที่ 9 ตำบล ท่าโพธิ์ อ.เมืองพิษณุโลก 65000
                    อีเมล์ narongrit.ku@psru.ac.th

                </p>
            </div>
        </div>

        <!-- End of receipt mid -->

        <div class="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>สินค้า</h2>
                        </td>
                        <td class="Hours">
                            <h2>จำนวน</h2>
                        </td>
                        <td class="Rate">
                            <h2>จำนวน</h2>
                        </td>
                        <td class="Rate">
                            <h2>ราคา</h2>
                        </td>
                        <td class="Rate">
                            <h2>รวม</h2>
                        </td>
                    </tr>

                    @foreach($order_receipt as $receipt)

                    @endforeach
                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">{{$receipt->product->product_name}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">20</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">5</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">0</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">100</p>
                        </td>

                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate">
                            <p class="itemtext">ภาษี</p>
                        </td>
                        <td class="Payment">
                            <p class="itemtext">100</p>
                        </td>


                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate"> ทั้งหมด</td>
                        <td class="Payment">
                            <h2>300</h2>
                        </td>


                    </tr>
                </table>
                <div class="legalcopy">
                    <p class="legal"> <strong>** ขอบคุณที่มาใช้บริการทางร้านเรา **</strong><br>

                        the good which are subject to tax , prices includes tax
                    </p>
                </div>
                <div class="serial-number">
                    เลขที่ใบเสร็จ <span class="serial">
                        1234579879887
                    </span>
                    <span>
                        29/11/2021 &nbsp; &nbsp; 00:08
                    </span>
                </div>
            </div>
        </div>



    </div>
</div>


<style>
    #invoice-POS {
        box-shadow: 0 0 1in 0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 58mm;
        background: #fff;
    }

    #invoice-POS ::selection {
        background: #34485e;
        color: #fff;
    }

    #invoice-POS ::-moz-selection {
        background: #410941;
        color: #fff;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: 0.5em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: 0.7em;
        font-weight: 300;
        line-height: 1.2em;
        color: #666;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        height: 60px;
        display: block;
        margin-left: 0;
        text-align: center;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: 0, 5em;
        background: #eee;
    }

    #invoice-POS .service {

        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 0.5em;
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
        text-align: center;
    }

    .serial-number {
        margin: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }

    .serial {
        font-size: 10px !important;
    }
</style>