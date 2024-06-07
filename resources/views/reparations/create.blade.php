<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer une réparation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Créer une réparation</h2>
    <form action="{{ route('reparations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <label for="mecanicien_id" class="form-label">Mécanicien</label>
            <select class="form-select" id="mecanicien_id" name="mecanicien_id" required>
                @foreach ($mecaniciens as $mecanicien)
                    <option value="{{ $mecanicien->id }}">{{ $mecanicien->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" id="status" name="status" required>
                @foreach ($statusOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicule_id" class="form-label">Véhicule</label>
            <select class="form-select" id="vehicule_id" name="vehicule_id" required>
                @foreach ($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">{{ $vehicule->marque }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="startDate" name="startDate" value="{{ now()->toDateString() }}" required>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="endDate" name="endDate" value="{{ now()->addWeek()->toDateString() }}" required>
        </div>
        <div class="mb-3">
            <label for="mechanicNotes" class="form-label">Notes du mécanicien</label>
            <textarea class="form-control" id="mechanicNotes" name="mechanicNotes"></textarea>
        </div>
        <div class="mb-3">
            <label for="clientNotes" class="form-label">Notes du client</label>
            <textarea class="form-control" id="clientNotes" name="clientNotes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

</body>
</html>
