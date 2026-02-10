import 'package:flutter/material.dart';
import '../core/constants/app_colors.dart';

class CentreCard extends StatelessWidget {
  final String name;

  const CentreCard({required this.name, super.key});

  @override
  Widget build(BuildContext context) {
    return Card(
      color: AppColors.surface,
      margin: const EdgeInsets.only(bottom: 12),
      child: ListTile(
        title: Text(name),
        trailing: const Icon(Icons.arrow_forward),
        onTap: () {
          Navigator.pushNamed(
            context,
            '/centre-detail',
            arguments: name,
          );
        },
      ),
    );
  }
}
