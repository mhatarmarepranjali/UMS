<!-- app/Views/data/pdf_export_table.php -->

<div class="container">
    <div class="table-responsive">
        <h1 style="margin-top: 30px;">Customer Data Table</h1>

        <?php if (!empty($users)): ?>
            <table style="margin-top: 10px; width: 100%; border-collapse: collapse; border: 1px solid #ddd;" class="table table-bordered table-striped">
                <thead style="color: #FFF; font-weight: 700; background: #9b4085; white-space: nowrap;">
                    <tr style="white-space: nowrap;">
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">S/N</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">First Name</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">Last Name</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">Email</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">DOB</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">Gender</th>
                        <th style="border: 1px solid #fff; padding: 8px; background-color: #f8f9fa;">Address</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['id']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['f_name']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['l_name']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['email']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['dob']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= ($user['gender'] === '1') ? 'Male' : 'Female';?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $user['address']; ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>
</div>
