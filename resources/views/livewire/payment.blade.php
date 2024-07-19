<div>
    {{-- Be like water. --}}
    <h3 class="text text-center py-2">รายชื่อทีมชำระเงินแล้ว </h3>
    <section class="login-signup section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="signup">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ui>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </ui>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}" class="signup-form row">
                            @csrf



                            <table class="col-md-12 text-dark">
                                <thead>
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>ชื่อทีม</th>
                                        <th>สาขา</th>
                                        <th>ประเภท</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>  <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Ban JK</td>
                                        <td>เครื่องจักรกลเกษตร</td>
                                        <td>ชาย</td>
                                        <td>ชำระแล้ว</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
