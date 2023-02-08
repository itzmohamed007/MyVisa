<template>
    <div class="container px-4 px-lg-5">
        <div class="form-wrapper row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text"/>
                        <label>Full Name:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="date"/>
                        <label>Birth Date:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text"/>
                        <label>Nationality:</label>
                    </div>
                    <div class="form-floating mb-3" >
                        <select class="cpt-4 form-select form-control" aria-label="Default select">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widow</option>
                        </select>
                        <label>Familial Situation:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="email"/>
                        <label>Email:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text"/>
                        <label>Visa Type:</label>
                    </div>
                    <div class="form-floating mb-3" >
                        <select class="cpt-4 form-select form-control" aria-label="Default select">
                            <option>Long Stay Visa</option>
                            <option>Long Short Visa</option>
                        </select>
                        <label>Visa Type:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="date"/>
                        <label>Start Date:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="date"/>
                        <label>End Date:</label>
                    </div>
                    <div class="form-floating mb-3" >
                        <select class="cpt-4 form-select form-control" aria-label="Default select">
                            <option>Identity Card</option>
                            <option>Passport</option>
                        </select>
                        <label>Document Type:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="number"/>
                        <label>Document Number:</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

