@extends('layouts.app')

@section('content')
    <div class="navbar-stock mb-3">
        <div class="navbar-stock-title">На складе</div>
    </div>
    <div class="container">
        @foreach ($products as $product)
            @if ($product->status == 1)
                <a href="{{ route('stock.activ', $product->id) }}">
                    <div class="setting-stock mt-2">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-6">
                                <div class="text">{{ $product->name }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text">
                                    {{ intdiv($product->TimeInRental, 60) }} ч. {{ $product->TimeInRental % 60 }} м.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
    @if (Auth::user()->role_id == 1)
        <div class="navbar-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-3 p-1">
                        <div class="stock active-navbar p-2">
                            <a href="{{ route('stock.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" preserveAspectRatio="xMidYMid meet"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.5385 28.9286V21.4184C11.5385 20.8934 12.1154 20.3578 12.6923 20.3578H17.3077C17.8846 20.3578 18.4615 20.8934 18.4615 21.4291V28.9286C18.4615 29.2128 18.5831 29.4853 18.7995 29.6862C19.0159 29.8871 19.3094 30 19.6154 30H28.8462C29.1522 30 29.4457 29.8871 29.662 29.6862C29.8784 29.4853 30 29.2128 30 28.9286V13.9296C30.0003 13.7888 29.9707 13.6494 29.9128 13.5192C29.855 13.389 29.7702 13.2708 29.6631 13.1711L26.5385 10.272V3.216C26.5385 2.93185 26.4169 2.65935 26.2005 2.45843C25.9841 2.25751 25.6906 2.14464 25.3846 2.14464H23.0769C22.7709 2.14464 22.4774 2.25751 22.261 2.45843C22.0446 2.65935 21.9231 2.93185 21.9231 3.216V5.98653L15.8169 0.314752C15.7097 0.21498 15.5824 0.135822 15.4422 0.0818117C15.302 0.0278014 15.1518 0 15 0C14.8482 0 14.698 0.0278014 14.5578 0.0818117C14.4176 0.135822 14.2903 0.21498 14.1831 0.314752L0.336925 13.1711C0.229844 13.2708 0.144971 13.389 0.0871596 13.5192C0.029348 13.6494 -0.000268961 13.7888 1.84037e-06 13.9296V28.9286C1.84037e-06 29.2128 0.121567 29.4853 0.337955 29.6862C0.554344 29.8871 0.847829 30 1.15385 30H10.3846C10.6906 30 10.9841 29.8871 11.2005 29.6862C11.4169 29.4853 11.5385 29.2128 11.5385 28.9286Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="rent p-2">
                            <a href="{{ route('rent.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.45678e-08 9.35552C-0.000254502 11.5275 0.752243 13.6324 2.12916 15.3111C3.50609 16.9898 5.42216 18.1384 7.55062 18.5611C7.67321 17.2167 8.0179 15.902 8.57063 14.6705C6.92813 14.115 5.8725 12.8538 5.625 11.0634H4.6875V10.2639H5.56125V9.44936C5.56 9.36178 5.5625 9.27732 5.56875 9.196H4.6875V8.39462H5.64562C6.0675 6.05241 7.89938 4.6636 10.6519 4.6636C11.2444 4.6636 11.7581 4.72178 12.1875 4.82312V6.1988C11.6859 6.08781 11.173 6.03616 10.6594 6.0449C8.93625 6.0449 7.77562 6.91948 7.40812 8.39462H11.0025V9.196H7.29C7.285 9.28358 7.28313 9.37554 7.28438 9.47188V10.2639H11.0025V11.0653H7.36875C7.59 12.1951 8.24625 12.9983 9.25313 13.3718C10.2404 11.7352 11.5981 10.3538 13.2168 9.33891C14.8355 8.32406 16.6699 7.70424 18.5719 7.52943C18.112 5.25011 16.8234 3.22274 14.9556 1.84002C13.0878 0.457304 10.7738 -0.182341 8.4618 0.0449895C6.1498 0.272319 4.00437 1.35044 2.44109 3.07052C0.877806 4.7906 0.00794439 7.03021 6.45678e-08 9.35552ZM30 19.6778C30 22.4154 28.9135 25.0409 26.9795 26.9767C25.0456 28.9125 22.4225 30 19.6875 30C16.9525 30 14.3294 28.9125 12.3955 26.9767C10.4615 25.0409 9.375 22.4154 9.375 19.6778C9.375 16.9401 10.4615 14.3146 12.3955 12.3788C14.3294 10.443 16.9525 9.35552 19.6875 9.35552C22.4225 9.35552 25.0456 10.443 26.9795 12.3788C28.9135 14.3146 30 16.9401 30 19.6778ZM15.4688 22.1589C15.5981 23.726 16.8675 24.9459 19.1512 25.0904V26.2465H20.1637V25.0829C22.5244 24.9215 23.9062 23.6941 23.9062 21.9111C23.9062 20.2877 22.8506 19.4526 20.9625 19.0209L20.1637 18.8332V15.6877C21.1763 15.8004 21.8213 16.339 21.975 17.0859H23.7525C23.6213 15.577 22.2919 14.3965 20.1637 14.267V13.1091H19.1512V14.2896C17.1337 14.4829 15.7613 15.6634 15.7613 17.3337C15.7613 18.8107 16.7812 19.751 18.48 20.1357L19.1512 20.2952V23.6359C18.1125 23.4857 17.4263 22.9302 17.2706 22.1589H15.4688ZM19.1437 18.6024C18.1462 18.3772 17.6063 17.9192 17.6063 17.2286C17.6063 16.4591 18.1894 15.8792 19.1512 15.7103V18.6005H19.1419L19.1437 18.6024ZM20.31 20.5617C21.5194 20.8339 22.0781 21.2749 22.0781 22.0556C22.0781 22.9452 21.3844 23.557 20.1656 23.6697V20.5279L20.31 20.5617Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="statistics p-2">
                            <a href="{{ route('statistics.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.625 2.14286C20.625 1.57454 20.8225 1.02949 21.1742 0.627628C21.5258 0.225765 22.0027 0 22.5 0H26.25C26.7473 0 27.2242 0.225765 27.5758 0.627628C27.9275 1.02949 28.125 1.57454 28.125 2.14286V27.8571H29.0625C29.3111 27.8571 29.5496 27.97 29.7254 28.171C29.9012 28.3719 30 28.6444 30 28.9286C30 29.2127 29.9012 29.4853 29.7254 29.6862C29.5496 29.8871 29.3111 30 29.0625 30H0.9375C0.68886 30 0.450403 29.8871 0.274587 29.6862C0.098772 29.4853 0 29.2127 0 28.9286C0 28.6444 0.098772 28.3719 0.274587 28.171C0.450403 27.97 0.68886 27.8571 0.9375 27.8571H1.875V21.4286C1.875 20.8602 2.07254 20.3152 2.42417 19.9133C2.77581 19.5115 3.25272 19.2857 3.75 19.2857H7.5C7.99728 19.2857 8.47419 19.5115 8.82582 19.9133C9.17746 20.3152 9.375 20.8602 9.375 21.4286V27.8571H11.25V12.8571C11.25 12.2888 11.4475 11.7438 11.7992 11.3419C12.1508 10.9401 12.6277 10.7143 13.125 10.7143H16.875C17.3723 10.7143 17.8492 10.9401 18.2008 11.3419C18.5525 11.7438 18.75 12.2888 18.75 12.8571V27.8571H20.625V2.14286Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="back p-2">
                            <a href="{{ route('home') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 30C11.0218 30 7.20644 28.4196 4.3934 25.6066C1.58035 22.7936 0 18.9782 0 15C0 11.0218 1.58035 7.20644 4.3934 4.3934C7.20644 1.58035 11.0218 0 15 0C18.9782 0 22.7936 1.58035 25.6066 4.3934C28.4196 7.20644 30 11.0218 30 15C30 18.9782 28.4196 22.7936 25.6066 25.6066C22.7936 28.4196 18.9782 30 15 30ZM21.5625 15.9375C21.8111 15.9375 22.0496 15.8387 22.2254 15.6629C22.4012 15.4871 22.5 15.2486 22.5 15C22.5 14.7514 22.4012 14.5129 22.2254 14.3371C22.0496 14.1613 21.8111 14.0625 21.5625 14.0625H10.7006L14.7262 10.0387C14.9023 9.86271 15.0012 9.62395 15.0012 9.375C15.0012 9.12605 14.9023 8.88729 14.7262 8.71125C14.5502 8.53521 14.3115 8.43632 14.0625 8.43632C13.8135 8.43632 13.5748 8.53521 13.3988 8.71125L7.77375 14.3363C7.68644 14.4233 7.61718 14.5268 7.56991 14.6407C7.52265 14.7546 7.49833 14.8767 7.49833 15C7.49833 15.1233 7.52265 15.2454 7.56991 15.3593C7.61718 15.4732 7.68644 15.5767 7.77375 15.6637L13.3988 21.2887C13.5748 21.4648 13.8135 21.5637 14.0625 21.5637C14.3115 21.5637 14.5502 21.4648 14.7262 21.2887C14.9023 21.1127 15.0012 20.874 15.0012 20.625C15.0012 20.376 14.9023 20.1373 14.7262 19.9613L10.7006 15.9375H21.5625Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->role_id == 2)
        <div class="navbar-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-4 p-1">
                        <div class="stock active-navbar p-2">
                            <a href="{{ route('stock.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" preserveAspectRatio="xMidYMid meet"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.5385 28.9286V21.4184C11.5385 20.8934 12.1154 20.3578 12.6923 20.3578H17.3077C17.8846 20.3578 18.4615 20.8934 18.4615 21.4291V28.9286C18.4615 29.2128 18.5831 29.4853 18.7995 29.6862C19.0159 29.8871 19.3094 30 19.6154 30H28.8462C29.1522 30 29.4457 29.8871 29.662 29.6862C29.8784 29.4853 30 29.2128 30 28.9286V13.9296C30.0003 13.7888 29.9707 13.6494 29.9128 13.5192C29.855 13.389 29.7702 13.2708 29.6631 13.1711L26.5385 10.272V3.216C26.5385 2.93185 26.4169 2.65935 26.2005 2.45843C25.9841 2.25751 25.6906 2.14464 25.3846 2.14464H23.0769C22.7709 2.14464 22.4774 2.25751 22.261 2.45843C22.0446 2.65935 21.9231 2.93185 21.9231 3.216V5.98653L15.8169 0.314752C15.7097 0.21498 15.5824 0.135822 15.4422 0.0818117C15.302 0.0278014 15.1518 0 15 0C14.8482 0 14.698 0.0278014 14.5578 0.0818117C14.4176 0.135822 14.2903 0.21498 14.1831 0.314752L0.336925 13.1711C0.229844 13.2708 0.144971 13.389 0.0871596 13.5192C0.029348 13.6494 -0.000268961 13.7888 1.84037e-06 13.9296V28.9286C1.84037e-06 29.2128 0.121567 29.4853 0.337955 29.6862C0.554344 29.8871 0.847829 30 1.15385 30H10.3846C10.6906 30 10.9841 29.8871 11.2005 29.6862C11.4169 29.4853 11.5385 29.2128 11.5385 28.9286Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 p-1">
                        <div class="rent p-2">
                            <a href="{{ route('rent.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.45678e-08 9.35552C-0.000254502 11.5275 0.752243 13.6324 2.12916 15.3111C3.50609 16.9898 5.42216 18.1384 7.55062 18.5611C7.67321 17.2167 8.0179 15.902 8.57063 14.6705C6.92813 14.115 5.8725 12.8538 5.625 11.0634H4.6875V10.2639H5.56125V9.44936C5.56 9.36178 5.5625 9.27732 5.56875 9.196H4.6875V8.39462H5.64562C6.0675 6.05241 7.89938 4.6636 10.6519 4.6636C11.2444 4.6636 11.7581 4.72178 12.1875 4.82312V6.1988C11.6859 6.08781 11.173 6.03616 10.6594 6.0449C8.93625 6.0449 7.77562 6.91948 7.40812 8.39462H11.0025V9.196H7.29C7.285 9.28358 7.28313 9.37554 7.28438 9.47188V10.2639H11.0025V11.0653H7.36875C7.59 12.1951 8.24625 12.9983 9.25313 13.3718C10.2404 11.7352 11.5981 10.3538 13.2168 9.33891C14.8355 8.32406 16.6699 7.70424 18.5719 7.52943C18.112 5.25011 16.8234 3.22274 14.9556 1.84002C13.0878 0.457304 10.7738 -0.182341 8.4618 0.0449895C6.1498 0.272319 4.00437 1.35044 2.44109 3.07052C0.877806 4.7906 0.00794439 7.03021 6.45678e-08 9.35552ZM30 19.6778C30 22.4154 28.9135 25.0409 26.9795 26.9767C25.0456 28.9125 22.4225 30 19.6875 30C16.9525 30 14.3294 28.9125 12.3955 26.9767C10.4615 25.0409 9.375 22.4154 9.375 19.6778C9.375 16.9401 10.4615 14.3146 12.3955 12.3788C14.3294 10.443 16.9525 9.35552 19.6875 9.35552C22.4225 9.35552 25.0456 10.443 26.9795 12.3788C28.9135 14.3146 30 16.9401 30 19.6778ZM15.4688 22.1589C15.5981 23.726 16.8675 24.9459 19.1512 25.0904V26.2465H20.1637V25.0829C22.5244 24.9215 23.9062 23.6941 23.9062 21.9111C23.9062 20.2877 22.8506 19.4526 20.9625 19.0209L20.1637 18.8332V15.6877C21.1763 15.8004 21.8213 16.339 21.975 17.0859H23.7525C23.6213 15.577 22.2919 14.3965 20.1637 14.267V13.1091H19.1512V14.2896C17.1337 14.4829 15.7613 15.6634 15.7613 17.3337C15.7613 18.8107 16.7812 19.751 18.48 20.1357L19.1512 20.2952V23.6359C18.1125 23.4857 17.4263 22.9302 17.2706 22.1589H15.4688ZM19.1437 18.6024C18.1462 18.3772 17.6063 17.9192 17.6063 17.2286C17.6063 16.4591 18.1894 15.8792 19.1512 15.7103V18.6005H19.1419L19.1437 18.6024ZM20.31 20.5617C21.5194 20.8339 22.0781 21.2749 22.0781 22.0556C22.0781 22.9452 21.3844 23.557 20.1656 23.6697V20.5279L20.31 20.5617Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 p-1">
                        <div class="statistics p-2">
                            <a href="{{ route('statistics.index') }}">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.625 2.14286C20.625 1.57454 20.8225 1.02949 21.1742 0.627628C21.5258 0.225765 22.0027 0 22.5 0H26.25C26.7473 0 27.2242 0.225765 27.5758 0.627628C27.9275 1.02949 28.125 1.57454 28.125 2.14286V27.8571H29.0625C29.3111 27.8571 29.5496 27.97 29.7254 28.171C29.9012 28.3719 30 28.6444 30 28.9286C30 29.2127 29.9012 29.4853 29.7254 29.6862C29.5496 29.8871 29.3111 30 29.0625 30H0.9375C0.68886 30 0.450403 29.8871 0.274587 29.6862C0.098772 29.4853 0 29.2127 0 28.9286C0 28.6444 0.098772 28.3719 0.274587 28.171C0.450403 27.97 0.68886 27.8571 0.9375 27.8571H1.875V21.4286C1.875 20.8602 2.07254 20.3152 2.42417 19.9133C2.77581 19.5115 3.25272 19.2857 3.75 19.2857H7.5C7.99728 19.2857 8.47419 19.5115 8.82582 19.9133C9.17746 20.3152 9.375 20.8602 9.375 21.4286V27.8571H11.25V12.8571C11.25 12.2888 11.4475 11.7438 11.7992 11.3419C12.1508 10.9401 12.6277 10.7143 13.125 10.7143H16.875C17.3723 10.7143 17.8492 10.9401 18.2008 11.3419C18.5525 11.7438 18.75 12.2888 18.75 12.8571V27.8571H20.625V2.14286Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
