var count = document.getElementById('val');
var btn_submit = document.getElementById('student_count');

btn_submit.addEventListener('click',(event) => {
    form_gen(count.value);
});

function form_gen(count){
    const form = document.querySelector(".reg-form");

    let student_form = "";

    for (let x = 0; x < count; x++) {
        student_form += `
            <div class="col-md-5 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" name="lastName-${x}" placeholder="" value="" pattern="[A-Za-zА-Яа-я]{,8}" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" name="firstName-${x}" placeholder="" value="" pattern="[A-Za-zА-Яа-я]{,8}" required>
                    </div>

                    <div class="col-12">
                        <label for="middleName" class="form-label">По батькові </label>
                        <input type="text" class="form-control" name="middleName-${x}" placeholder="" pattern="[A-Za-zА-Яа-я]{,8}" required>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-${x}" placeholder="example@mail.com" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" name="phone-${x}" placeholder="0999999999" value="" pattern="\\[0-9]{9}" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="text" class="password form-control" name="password-${x}" placeholder="*********" required="" readonly required>
                    </div>
                </div>
            </div>
            <hr class="my-4">
        `;
    }

    $('#form-btn').removeClass('hidden')

    form.innerHTML = student_form;
}
