import 'package:flutter/material.dart';
import 'package:kite_surf_app/app/router.dart';
import '../core/theme/app_theme.dart';

class KiteSurfApp extends StatelessWidget {
  const KiteSurfApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      onGenerateRoute: AppRouter.onGenerateRoute,
      initialRoute: '/',
    );
  }
}
