<?php

// #1Let's create an empty "box of boxes".
// Each inner box will store the permissions of a category.
$groupedPermissions = [];

// #2 Let's iterate through the list of permissions that the controller has passed to us by $permissions.
foreach ($permissions as $permission) {
    // #3 For each permission, we look at its name (eg: 'users-view')
    // and we use our "magic scissors" (explode) to cut by the hyphen '-'.
    // This gives us the pieces: ['users', 'view'].
    // We only keep the first piece, which is the category. (so .. [0] is the category)
    $category = explode('-', $permission['permission_name'])[0];

    // #4 Now, we use that category as a "label" for our box of BOXES.
    // We say: "Put this complete permission in the box that has the label 'users'" (users is a box in that big box that call each box category).
    // If the box 'users' doesn't exist, PHP creates it for us.
    $groupedPermissions[$category][] = $permission;
}


// #5 We create a map that translates the internal keys to the titles that the user will see.
$categoryNames = [
    'users' => '🔑 Account Management',
    'roles' => '🔑 Account Management',
    'services' => '🎪 Zoo Management',
    'schedules' => '🎪 Zoo Management',
    'habitats' => '🎪 Zoo Management',
    'animals' => '🐼 Animal Management',
    'animal_stats' => '🐼 Animal Management',
    'animal_feeding' => '🐼 Animal Management',
    'vet_reports' => '⚕️ Veterinary',
    'habitat_suggestions' => '⚕️ Veterinary',
    'testimonials' => '💬 Public Interaction'
];

// #6 we check if 'roles' exists in our grouped data.
if (isset($groupedPermissions['roles'])) {
    # "We create a new box $groupedPermissions['users'] that will be the result of merging...     
    #  the box $groupedPermissions['users'] (or an empty array if it doesn't exist)...
    #  with the box $groupedPermissions['roles']."
    $groupedPermissions['users'] = array_merge($groupedPermissions['users'] ?? [], $groupedPermissions['roles']);

    # "We remove the box $groupedPermissions['roles'] from our grouped data."
    unset($groupedPermissions['roles']);
}
?>

<div class="container-fluid overflow-auto py-4 pt-4 px-4">
    <div class="row py-4 card">
        <div class="col-12">
            <div class="rounded h-100 p-4" style="background-color: #c3c1c8;">
                <h1 class="h3">System Permissions Catalog</h1>
                <p class="mb-4">
                    This is a list of all possible actions within the system.
                    It cannot be edited here; it serves as a reference dictionary.
                </p>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 40%;" class="ps-4">Permiso</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rowNumber = 0;
                                // We need to keep track of the categories we have already rendered to avoid repeating the header.

                                $processedCategories = [];

                                ?>


                                <?php

                                // 1. Main loop: We iterate through each box in our box of boxes, in which each box of boxes contains a list of permissions!!.

                                foreach ($groupedPermissions as $categoryKey => $permissionsInCategory): ?>


                                    <?php

                                    // 2. We use our "translation dictionary" ($categoryNames) to convert the label.
                                    // We convert the category key ($categoryKey) into its readable name; if it doesn't exist, we use 'Others' as the default (🔑 Account Management).
                                    $currentCategoryName = $categoryNames[$categoryKey] ?? 'Others';

                                    // 3. We check if we have already rendered this category.
                                    // We check if the category name is already in the array of processed categories.
                                    // If it is not, we render the category header.
                                    // If it is, we skip rendering the category header.
                                    if (!in_array($currentCategoryName, $processedCategories)) {
                                        echo '<tr><td colspan="2" class="table-dark fw-bold ps-4">' . $currentCategoryName . '</td></tr>';
                                        //4. We add the category name to the array of processed categories cause is empty!.
                                        $processedCategories[] = $currentCategoryName;
                                    }
                                    ?>

                                    <?php
                                    // 5. We iterate through the list of permissions in the current category.
                                    ?>

                                    <?php foreach ($permissionsInCategory as $permission): ?>
                                        <?php

                                        $rowNumber++;
                                        // 6. the array of permissions in the current category is $permissionsInCategory, we will iterate inside this array to get each permission, and make it readable for the user.
                                        $prettyName = ucwords(str_replace(['-', '_'], ' ', $permission['permission_name']));


                                        
                                        ?>
                                        <tr class="<?php echo get_row_class($rowNumber); ?>">

                                            <td class="ps-4">
                                                <strong>
                                                    <?= htmlspecialchars($prettyName) ?>
                                                </strong>

                                                                                                
                                                (<code>
                                                    <?= htmlspecialchars($permission['permission_name']) ?>
                                                </code>)
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($permission['permission_desc']) ?>
                                            </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>