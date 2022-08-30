<!DOCTYPE html>
<html>

<head>
    <title>{{ $details['companyName'] }}</title>
    <style>
        #wrap {
            border: 5px solid #982628;
            max-width: 500px;
            border-radius: 5px;
            padding: 15px;
            margin: auto;
        }

        #wrap h1 {
            text-align: center;
            text-transform: uppercase;
        }

        dd {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="wrap">
        <h1>Liên hệ từ khách hàng</h1>
        <div>
            <dl>
                <dt>
                    Họ tên khách hàng:
                </dt>
                <dd>
                    {{ $details['name'] }}
                </dd>
            </dl>
            <dl>
                <dt>
                    Ngành nghề:
                </dt>
                <dd>
                    {{ $details['profection'] }}
                </dd>
            </dl>
            <dl>
                <dt>
                    Email:
                </dt>
                <dd>
                    {{ $details['email'] }}
                </dd>
            </dl>
            <dl>
                <dt>
                    Điện thoại:
                </dt>
                <dd>
                    {{ $details['phone'] }}
                </dd>
            </dl>
            <dl>
                <dt>
                    Ghi chú:
                </dt>
                <dd>
                    {{ $details['note'] }}
                </dd>
            </dl>
        </div>
    </div>
</body>
