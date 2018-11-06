@extends("layouts.default", ['page_title' => 'Payments'])

@section("head")
    <style>
    </style>
@stop

@section("content")
    <div class="wide-container">
        <div class="row">
            <div class="col s6">
                <h3>Payments</h3>
            </div>

            <div class="col s6 right mtop30">
                <a href="{{ route('payment.createsolo') }}" class="btn waves-effect waves-dark">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel" style="padding: 2px;">
                    <input id="search-input" class="card-input" name="search-input" type="search" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel flex">
                    <table id="payment-container" class="responsive-table striped">
                        <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Company Name</th>
                            <th>Amount</th>
                            <th>Received Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if($payments)
                                @foreach($payments as $key => $payment)
                                    <tr class="single-payment-row">
                                        <td>{{ $payment->invoice->nice_invoice_id }}</td>
                                        <td>{{ $payment->client->companyname }}</td>
                                        <td>${{ $payment->moneyformat }}</td>
                                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->receiveddate)->format('j F, Y') }}</td>
                                        <td>
                                            <a href="{{ route('payment.show', [ 'payment' => $payment ] ) }}"><i class="material-icons">remove_red_eye</i></a>
                                            <a href="{{ route('payment.edit', [ 'payment' => $payment ] ) }}"><i class="material-icons">mode_edit</i></a>
                                            <a href="#" data-id="{{ $payment->id }}" class="payment-delete-btn"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-confirmation" class="modal">
        <div class="modal-content">
            <p>Delete Invoice?</p>
        </div>
        <div class="modal-footer">
            <form id="delete-payment-form" method="post" class="null-form">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="modal-action waves-effect black-text waves-green btn-flat btn-deletemodal payment-confirm-delete-btn" type="submit">Delete</button>
            </form>
            <a href="javascript:;" class=" modal-action modal-close waves-effect black-text waves-red btn-flat btn-deletemodal">Cancel</a>
        </div>
    </div>
@stop

@section("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.0/jquery.mark.min.js" integrity="sha256-1iYR6/Bs+CrdUVeCpCmb4JcYVWvvCUEgpSU7HS5xhsY=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        "use strict";
        $(function() {
            Unicorn.initConfirmationTrigger('#payment-container', '.payment-delete-btn', 'payment', 'destroy', '#delete-confirmation', '#delete-payment-form');
            Unicorn.initPageSearch('#search-input', '#payment-container .single-payment-row');
        });
    </script>
@stop