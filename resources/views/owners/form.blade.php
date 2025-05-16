<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $owner->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="surname" class="form-label">Surname</label>
    <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $owner->surname ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $owner->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $owner->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $owner->address ?? '') }}" required>
</div>
