import 'package:flutter/material.dart';
import '../core/theme/app_theme.dart';
import '../pages/home/home_page.dart';

class KiteSurfApp extends StatelessWidget {
  const KiteSurfApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      home: const HomePage(),
    );
  }
}
