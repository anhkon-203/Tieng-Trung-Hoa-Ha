<?php get_header();
/* Template Name: Lịch khai giảng */
?>
<?php
// thành tích
$student_repeat = get_field('student_repeat');
// đăng ký tư vấn
$reg_img = get_field('reg_img');
$reg_title = get_field('reg_title');
$reg_shortcode = get_field('reg_shortcode');
?>
    <!--lịch-->
    <section class="section-opening-schedule-1">
        <div class="container">
            <div class="title">
                <h2>
                    <?= get_field('calendar_title') ?>
                </h2>
            </div>
            <div class="table-detail">
                <table>
                    <thead>
                    <tr>
                        <th>Trình độ</th>
                        <th>Tên lớp</th>
                        <th>Số buổi</th>
                        <th>Thời gian học</th>
                        <th>Giờ học</th>
                        <th>Thời lượng học</th>
                        <th>Ngày khai giảng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $calendar_re = get_field('calendar_re');
                    if ($calendar_re) {
                        foreach ($calendar_re as $item) {
                            ?>
                            <tr>
                            <th rowspan="<?php echo count($item['calendar_repeat']); ?>"><?php echo esc_html($item['level']); ?></th>
                            <?php
                            foreach ($item['calendar_repeat'] as $index => $class) {
                                if ($index !== 0) {
                                    echo '<tr>';
                                }
                                ?>
                                <td><?php echo esc_html($class['class_name']); ?></td>
                                <td><?php echo esc_html($class['number_of_sessions']); ?></td>
                                <td><?php echo esc_html($class['study_time']); ?></td>
                                <td><?php echo esc_html($class['study_hours']); ?></td>
                                <td><?php echo esc_html($class['study_duration']); ?></td>
                                <td><?php echo esc_html($class['start_date']); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
    <!-- thành tích-->
    <section class="section-homepage-1 section-opening-schedule-2">
        <div class="container">
            <div class="title">
                <h2>
                    <?= get_field('title_achv') ?>
                </h2>
            </div>
            <div class="content row">
                <?php foreach ($student_repeat as $key => $value) : ?>
                    <div class="col-lg-4 col-6">
                        <div class="child">
                            <div class="top">
                                <div class="image">
                                    <figure>
                                        <img src="<?= getimage($value['img']) ?>" alt="">
                                    </figure>
                                </div>
                                <div class="text">
                                    <div class="medal">
                                        <div class="item">
                                            <?php
                                            $point = $value['point'];
                                            ?>
                                            <p>
                                                <?= $point['title'] ?>
                                            </p>
                                            <span>
                                        <?= $point['point'] ?>
                                    </span>
                                        </div>
                                    </div>
                                    <h4>
                                        <?= $value['mota'] ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="bot">
                                <div class="name">
                                    <h4>
                                        <?= $value['name'] ?>
                                    </h4>
                                    <p>
                                        <?= $value['univer'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--đăng ký-->
    <section class="section-homepage-7">
        <div class="content">
            <div class="left">
                <div class="form-advise">
                    <div class="title">
                        <h2>
                            <?php echo $reg_title ?>
                        </h2>
                    </div>
                    <?php echo do_shortcode($reg_shortcode) ?>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <figure>
                        <img src="<?php echo getimage($reg_img) ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>