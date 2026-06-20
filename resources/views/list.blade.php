<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة المسجلين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>📋 قائمة الأوصياء والأيتام المسجلين</h2>
        <a href="{{ route('register') }}" class="btn btn-primary mb-3">➕ تسجيل جديد</a>
        <div class="row">
            @foreach($guardians as $guardian)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <strong>الوصي:</strong> {{ $guardian->full_name }}
                        </div>
                        <div class="card-body">
                            <p><strong>هوية الوصي:</strong> {{ $guardian->id_number }}</p>
                            <p><strong>عدد الأيتام:</strong> {{ $guardian->orphans->count() }}</p>
                            <p><strong>الأب:</strong> {{ $guardian->father->full_name ?? 'لا يوجد' }}</p>
                            <p><strong>الأم:</strong> {{ $guardian->mother->full_name ?? 'لا يوجد' }}</p>
                            <hr>
                            <h6>الأيتام:</h6>
                            <ul>
                                @foreach($guardian->orphans as $orphan)
                                    <li>{{ $orphan->full_name }} - {{ $orphan->orphan_type == 'father_only' ? 'يتيم الأب' : 'يتيم الأبوين' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
