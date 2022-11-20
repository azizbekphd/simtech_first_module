<?php
include("./components/navbar.php");
include("./components/error_alert.php");
include("./api/send_feedback.php");
$result = send_feedback();
?>
<main>
    <?php if ($result->ok): ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">
                Feedback <strong>#<?php echo $result->value->id; ?></strong> has been sent
            </h4>
            <p>
                You can see <a href="/sent_feedbacks.php" class="alert-link">a list of feedbacks</a>
                or <a href="/contact_us.php" class="alert-link">send another feedback</a>
            </p>
        </div>
    <?php else: ?>
        <?php if ($result->error) {
            error_alert($result->error);
        } ?>
    <form method="POST" id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <h2 class="form-title">Leave a feedback</h2>
        <hr />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required/>
            <div class="invalid-feedback">Please, enter your name</div>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" required/>
        </div>
        <div class="form-group">
            <label for="prefix">Prefix</label>
            <select class="custom-select" id="prefix" name="prefix" required>
                <option disabled selected value="">Please, select</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Miss">Miss</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required/>
        </div>
        <div class="form-group">
            <label>Rating</label><br />
            <?php for ($i=1; $i<=5; $i++):
                $id = "rating" . $i;
            ?>
            <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="rating" id="<?php echo $id; ?>" value="<?php echo $i; ?>" required>
                <label class="custom-control-label" for="<?php echo $id; ?>"><?php echo $i ?></label>
            </div>
            <?php endfor; ?>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" placeholder="Enter message" name="message"></textarea>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="application" name="application">
                <label class="custom-file-label" for="application">Application file</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">Agree to terms and conditions</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <button type="reset" class="btn">Reset</button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <?php endif; ?>
</main>

<style>
    form {
        max-width: 30rem;
        margin: 20px auto;
    }

    .form-title {
        text-align: center;
    }

    .col {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .col > button {
        width: 100%;
        max-width: 12rem;
    }
</style>
