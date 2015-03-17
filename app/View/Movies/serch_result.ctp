// <?php echo $this->Html->css('view-serchResult/common-setting'); ?>
// <?php echo $this->Html->css('view-serchResult/place-title.css'); ?>
// <?php echo $this->Html->css('view-serchResult/movie-list.css'); ?>
// <?php echo $this->Html->css('view-serchResult/select-page-button-movie.cs'); ?>
// <?php echo $this->Html->css('view-serchResult/view-reccomend-movie-for-movie.css'); ?>


//   <!-- CONTENT ============-->
//   <div class="row main-content">

//    <!-- お店の概要 ============-->
//     <div class="row">
//       <div class="col-md-12 view-header-place-name-div">
//           <span class="view-header-place-name">
//             検索結果
//           </span>
//       </div>
//     </div>
//     <!-- /お店の概要 ============-->

//     <!-- 動画とお店の詳細 ============-->
//     <div class="row">
//       <div class="col-md-8">
//         <div class="row">
//         <!-- 動画 ============-->

//         <table class="movie-list-table table table-striped">
//           <!--mysqlからデータを習得-->
//           <?php foreach ($results as $result): ?>

//           <tr class="movie-list-tr">
//             <td class="movie-list-photo-td">
//               <!--画像表示-->
//               <a href ="/" class="movie-list-photo-a">
//                 <img src="<?php echo $result['Movie']['thumbnails_url']; ?>">
//               </a>
//             </td>
//             <td class="movie-list-description-td" valign="top">
//               <div class="movie-list-description-div">
//                 <span><?php echo $result['Moive']['description'] ?></span>
//               </div>  
//             </td>
//           </tr>
//           <?php endforeach; ?>
//         </table>
//         </div>
//       </div>
//     </div>
//         <!-- /動画 ============-->
  
//     <!-- /動画とお店の詳細 ============-->



//   </div>
// <!-- /CONTENT ============-->
