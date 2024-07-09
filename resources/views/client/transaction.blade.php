@extends('layouts.client') @section('content')
<table class="list-transaction">
    <thead>
        <tr>
            <td>#</td>
            <td>Gói du lịch</td>
            <td>Số hành khách</td>
            <td>Số điện thoại</td>
            <td>Ngày khởi hành</td>
            <td>Tác vụ</td>
        </tr>
    </thead>
    <tbody>
        @if(count($transactions) > 0)
            @foreach($transactions as $key => $transaction)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$transaction->Travel_Package->name}}</td>
                    <td>{{$transaction->tourists_number}}</td>
                    <td>{{$transaction->phone_number}}</td>
                    <td>{{$transaction->date_start}}</td>
                    <td>
                        <a href="/transaction-detail">Xem chi tiết</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" style="text-align: center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

<style>
    table.list-transaction{
        margin: 100px auto;
        width: 1200px;
        font-size: 16px;
    }

    .list-transaction{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .list-transaction thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .list-transaction th,
    .list-transaction td {
        padding: 12px 15px;
    }

    .list-transaction tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .list-transaction tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .list-transaction tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .list-transaction tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
</style>
@endsection
