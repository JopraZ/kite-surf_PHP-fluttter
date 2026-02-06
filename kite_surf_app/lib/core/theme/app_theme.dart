import 'package:flutter/material.dart';
import '../constants/app_colors.dart';

class AppTheme {
  static ThemeData get lightTheme {
  final colorScheme = ColorScheme.fromSeed(
    seedColor: AppColors.primary,
    primary: AppColors.primary,
    secondary: AppColors.accent,
    background: AppColors.background,
    surface: AppColors.background,
  );

  return ThemeData(
    useMaterial3: true,

    colorScheme: colorScheme.copyWith(
      surfaceContainerLowest: AppColors.background, // ⭐ LA CLÉ
    ),

    scaffoldBackgroundColor: AppColors.background,
    canvasColor: AppColors.background,

    appBarTheme: const AppBarTheme(
      backgroundColor: AppColors.primary,
      foregroundColor: Colors.white,
      centerTitle: true,
      elevation: 0,
    ),
  );
}
}
