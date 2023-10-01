<!DOCTYPE html>
<html>
<head>
    <title>Tower Game</title>
    <style>
        /* CSS untuk tampilan tabel permainan "Tower" */
        /* Ganti ini sesuai dengan kebutuhan Anda */
        table {
            border-collapse: collapse;
        }
        td {
            width: 30px;
            height: 30px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
        a {
            display: block;
            width: 100%;
            height: 100%;
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table>
        @foreach ($table as $rowIndex => $row)
            <tr>
                @foreach ($row as $colIndex => $col)
                    <td>
                        <a href="{{ route('reveal-cell', ['row' => $rowIndex, 'col' => $colIndex]) }}">
                            {{ $col }}
                        </a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    <form action="{{ route('reset-game') }}" method="post">
        @csrf
        <button type="submit">Reset Game</button>
    </form>
</body>
</html>
